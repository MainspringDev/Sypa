<?php

declare(strict_types=1);

namespace Sypa\Listener;

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use OpenCart\System\Engine\Action;
use OpenCart\System\Engine\Event;
use OpenCart\System\Engine\Loader;
use OpenCart\System\Engine\Registry;
use OpenCart\System\Library\Cache;
use OpenCart\System\Library\Config;
use OpenCart\System\Library\DB;
use OpenCart\System\Library\Document;
use OpenCart\System\Library\Language;
use OpenCart\System\Library\Log;
use OpenCart\System\Library\Request;
use OpenCart\System\Library\Response;
use OpenCart\System\Library\Session;
use OpenCart\System\Library\Url;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class LegacyBootloaderListener {
    /**
     * @var Container
     */
    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    /**
     * @param RequestEvent $event
     * @return RequestEvent
     * @throws \Exception
     */
    public function onRequestEvent(RequestEvent $event): RequestEvent {
        if ($event->getRequest()->attributes->get('_legacy') === true) {
            // @todo Resolve to app
            $app = $event->getRequest()->attributes->get('_app', 'catalog');

            $this->bootApplication($app);
            $this->bootServices($app);
        }

        return $event;
    }

    /**
     * @param string $app
     * @throws DependencyException
     * @throws NotFoundException
     */
    private function bootApplication(string $app): void {
        // @todo File check/validation and error throwing

        // Legacy Constants
        $globals = $this->container->get('legacy.config') . '/global/' . $app . '.php';

        require_once($globals);

        // Legacy Config
        $config = new Config();
        $config->load('default');
        $config->load($app);

        $settings = $this->container->get('legacy.config') . '/config/' . $app . '.php';

        // Load settings into container and legacy OpenCart config
        foreach (require($settings) as $setting => $value) {
            $this->container->set($setting, $value);
            $config->set($setting, $value);
        }

        $this->container->set('config', $config);
        $this->container->set(Config::class, $config);
    }

    /**
     * @param string $app
     * @throws \Exception
     */
    private function bootServices(string $app): void {
        // Registry
        $registry = new Registry($this->container);
        $this->container->set('registry', $registry);
        $this->container->set(Registry::class, $registry);

        // Config, previously set in self::bootApplication()
        $config = $this->container->get(Config::class);

        // Log
        $log = new Log($config->get('error_filename'));
        $this->container->set('log', $log);
        $this->container->set(Log::class, $log);

        // Event
        $event = new Event($registry);

        foreach ($config->get('action_event') ?? [] as $key => $value) {
            foreach ($value as $priority => $action) {
                $event->register($key, new Action($action), $priority);
            }
        }

        $this->container->set('event', $event);
        $this->container->set(Event::class, $event);

        // Loader
        $loader = new Loader($registry);
        $this->container->set('load', $loader);
        $this->container->set(Loader::class, $loader);

        // Request
        $request = new Request();
        $this->container->set('request', $request);
        $this->container->set(Request::class, $request);

        // Response
        $response = new Response();
        $response->addHeader('Content-Type: text/html; charset=utf-8');
        $response->setCompression($config->get('response_compression'));
        $this->container->set('response', $response);
        $this->container->set(Response::class, $response);

        // Database
        $db = new DB(
            $config->get('db_engine'),
            $config->get('db_hostname'),
            $config->get('db_username'),
            $config->get('db_password'),
            $config->get('db_database'),
            $config->get('db_port')
        );
        $db->query("SET time_zone = '" . $db->escape(date('P')) . "'");
        $this->container->set('db', $db);
        $this->container->set(DB::class, $db);

        // Session
        $session = new Session($config->get('session_engine'), $registry);

        if ($config->get('session_autostart')) {
            $session_id = $_COOKIE[$config->get('session_name')] ?? '';

            $session->start($session_id);

            setcookie(
                $config->get('session_name'),
                $session->getId(),
                (ini_get('session.cookie_lifetime') ? (time() + ini_get('session.cookie_lifetime')) : 0),
                ini_get('session.cookie_path'),
                ini_get('session.cookie_domain'),
                ini_get('session.cookie_secure'),
                ini_get('session.cookie_httponly')
            );
        }

        $this->container->set('session', $session);
        $this->container->set(Session::class, $session);

        // Cache
        $cache = new Cache($config->get('cache_engine'), $config->get('cache_expire'));
        $this->container->set('cache', $cache);
        $this->container->set(Cache::class, $cache);

        // Url
        $url = new Url($config->get('site_url'));
        $this->container->set('url', $url);
        $this->container->set(Url::class, $url);

        // Language
        $language = new Language($config->get('language_directory'));
        $this->container->set('language', $language);
        $this->container->set(Language::class, $language);

        // Document
        $document = new Document();
        $this->container->set('document', $document);
        $this->container->set(Document::class, $document);

        // Config Autoload
        if ($config->has('config_autoload')) {
            foreach ($config->get('config_autoload') as $value) {
                $loader->config($value);
            }
        }

        // Language Autoload
        if ($config->has('language_autoload')) {
            foreach ($config->get('language_autoload') as $value) {
                $loader->language($value);
            }
        }

        // Library Autoload
        if ($config->has('library_autoload')) {
            foreach ($config->get('library_autoload') as $value) {
                $loader->library($value);
            }
        }

        // Model Autoload
        if ($config->has('model_autoload')) {
            foreach ($config->get('model_autoload') as $value) {
                $loader->model($value);
            }
        }

        // Helper Autoload
        if ($config->has('helper_autoload')) {
            foreach ($config->get('helper_autoload') as $value) {
                $loader->model($value);
            }
        }
    }
}
