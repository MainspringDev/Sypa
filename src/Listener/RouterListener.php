<?php

declare(strict_types=1);

namespace Sypa\Listener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Sypa\Bridge\RouteResolverTrait;
use Sypa\Exception\UnresolvableRouteException;

class RouterListener {
    use RouteResolverTrait;

    /**
     * @param RequestEvent $event
     * @return RequestEvent
     * @throws UnresolvableRouteException
     */
    public function onRequestEvent(RequestEvent $event): RequestEvent {
        $request = $event->getRequest();

        $route = $this->resolveApplicationRoute($request);

        if ($this->hasRoute($route) === true) {
            $callable = $this->resolveRoute($route);

            $request->attributes->set('_controller', $callable);
            $request->attributes->set('_legacy', true);

            return new RequestEvent($event->getKernel(), $request, $event->getRequestType());
        }

        return $event;
    }

    private function resolveApplicationRoute(Request $request): string {
        // @todo Non-legacy routes.

        $path = $request->getPathInfo();
        $route = $request->query->get('route');

        if (\mb_stripos($path, '/admin/') === 0 || $path === '/admin') {
            return ('admin/' . $route);
        }

        if (\mb_stripos($path, '/api/') === 0 || $path === '/api') {
            return ('api/' . $route);
        }

        return ('catalog/' . $route);
    }
}
