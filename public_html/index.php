<?php

use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ContainerControllerResolver;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\KernelEvents;
use Sypa\Listener\LegacyBootloaderListener;
use Sypa\Listener\LegacyControllerPreActionListener;
use Sypa\Listener\LegacyViewListener;
use Sypa\Listener\RouterListener;

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../config/legacy/startup.php');

try {
    $dotenv = Dotenv::create(__DIR__ . '/../');
    $dotenv->load();

    $builder = new ContainerBuilder();
    $builder->addDefinitions(__DIR__ . '/../config/parameters.php');
    $builder->addDefinitions(__DIR__ . '/../config/services.php');
    $builder->addDefinitions(__DIR__ . '/../config/listeners.php');
    $builder->addDefinitions(__DIR__ . '/../config/decorators.php');
    // Legacy
    $builder->addDefinitions(__DIR__ . '/../config/legacy/parameters.php');
    // Build Container
    $container = $builder->build();

    $dispatcher = new EventDispatcher();
    // @todo listeners/subscribers
    // @todo Resolve to app: admin, api, catalog in event
    $dispatcher->addListener(KernelEvents::REQUEST, [new RouterListener(), 'onRequestEvent'], 500);
    $dispatcher->addListener(KernelEvents::REQUEST, [new LegacyBootloaderListener($container), 'onRequestEvent'], 480);
    $dispatcher->addListener(KernelEvents::REQUEST, [new LegacyControllerPreActionListener($container), 'onRequestEvent'], 460);
    $dispatcher->addListener(KernelEvents::VIEW, [new LegacyViewListener($container), 'onViewEvent'], 400);

    $request = Request::createFromGlobals();

    $resolver = new ContainerControllerResolver($container);

    // kernel
    $kernel = new HttpKernel($dispatcher, $resolver, new RequestStack(), new ArgumentResolver());

    $response = $kernel->handle($request);
    $response->send();

    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    if (($_ENV['ENVIRONMENT'] ?? 'prod') === 'dev') {
        echo "<pre>{$e->getMessage()}\n{$e->getFile()}\n{$e->getLine()}\n{$e->getTraceAsString()}</pre>";
    }

    $content = @file_get_contents(__DIR__ . '/../template/static/error.html');

    if ($content === false) {
        $content = "An internal server error occurred while trying to load the requested page. Please try again shortly.";
    }

    // @todo log error

    $response = new Response($content, 500);
    $response->send();
} finally {
    // @todo log
    // @todo error dispatching
}
