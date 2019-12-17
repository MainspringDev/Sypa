<?php

declare(strict_types=1);

namespace Sypa\Listener;

use DI\Container;
use OpenCart\System\Library\Response as LegacyResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class LegacyViewListener {
    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container) {
        $this->container = $container;
    }

    /**
     * @param ViewEvent $event
     * @return ViewEvent
     * @throws \Exception
     */
    public function onViewEvent(ViewEvent $event): ViewEvent {
        $request = $event->getRequest();

        if ($request->attributes->has('_legacy') === true) {
            $legacyResponse = $this->container->get(LegacyResponse::class);

            // @todo Will the http code be superseded by the headers?
            $response = new HttpResponse($legacyResponse->getOutput(), 200, $legacyResponse->getHeaders());

            $event->setResponse($response);
        }

        return $event;
    }
}
