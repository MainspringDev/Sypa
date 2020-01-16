<?php

declare(strict_types=1);

namespace Sypa\Listener;

use DI\Container;
use OpenCart\System\Engine\Action;
use OpenCart\System\Engine\Registry;
use OpenCart\System\Library\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class LegacyControllerPreActionListener {
    /**
     * @var Container
     */
    private Container $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    /**
     * @param RequestEvent $event
     * @return RequestEvent
     * @throws \Exception
     */
    public function onRequestEvent(RequestEvent $event): RequestEvent {
        if ($event->getRequest()->attributes->get('_legacy') === false) {
            return $event;
        }

        // It is important that Legacy BootloaderListener is run first so the APPLICATION global is defined
        $app = $event->getRequest()->attributes->get('_app', APPLICATION);

        $pre_actions = $this->container->get('action_pre_action');

        foreach ($pre_actions as $pre_action) {
            $response = $this->executePreAction($pre_action);

            // Stop execution and immediately return response
            if ($response instanceof HttpResponse === true) {
                $event->setResponse($response);

                return $event;
            }
        }

        return $event;
    }

    /**
     * @param array $pre_action
     * @return HttpResponse|null
     * @throws \Exception
     */
    private function executePreAction(array $pre_action): ?HttpResponse {
        list($class, $method) = $pre_action;

        $controller = $this->container->get($class);

        $result = call_user_func_array([$controller, $method], []);

        if ($result instanceof Action === true) {
            $registry = $this->container->get(Registry::class);

            $result->execute($registry);

            $legacyResponse = $this->container->get(Response::class);

            // @todo Handle HTTP status code. This will be important for a preaction response like maintenance.
            return new HttpResponse($legacyResponse->getOutput(), 200, $legacyResponse->getHeaders());
        }

        return null;
    }
}
