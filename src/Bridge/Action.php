<?php

declare(strict_types=1);

namespace Sypa\Bridge;

use OpenCart\System\Engine\Registry;
use Sypa\Exception\UnresolvableActionException;
use Sypa\Exception\UnresolvableRouteException;

class Action {
    use RouteResolverTrait;
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    private string $class;
    /**
     * @var mixed|string
     */
    private $method = 'index';

    /**
     * @param string|array $route
     * @throws UnresolvableActionException
     * @throws UnresolvableRouteException
     */
    public function __construct($route) {
        if (is_string($route) === false && is_array($route) === false) {
            throw new UnresolvableActionException(sprintf(
                "Error: Route must be a string or array. Type %s received.",
                gettype($route)
            ));
        }

        // @todo Problem: Could be an internal controller call or external route call!

        list($class, $method) = $this->resolveToCallable($route);

        $this->id = $route;
        $this->class = $class;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @param Registry $registry
     * @param array $args
     * @return \Exception|mixed
     */
    public function execute(Registry $registry, array &$args = []) {
        // Stop any magical methods being called
        if (substr($this->method, 0, 2) === '__') {
            return new \Exception(sprintf(
                "Call to magic method '%s::%s()' is prohibited.",
                $this->class,
                $this->method
            ));
        }

        if ($registry->has($this->class) === false) {
            return new \Exception(sprintf(
                "Controller '%s' was not found.",
                $this->class
            ));
        }

        $controller = $registry->get($this->class);

        $callable = [$controller, $this->method];

        if (is_callable($callable) === false) {
            return new \Exception(sprintf(
                "Could not call '%s::%s()'.",
                $this->class,
                $this->method
            ));
        }

        return call_user_func_array([$controller, $this->method], $args);
    }

    /**
     * @param string|array $route
     * @return array
     * @throws UnresolvableRouteException
     */
    private function resolveToCallable($route): array {
        if (is_array($route) === true) {
            return $route;
        }

        // @todo Research possibility this is exposing internal controllers to external calls.

        if (strpos($route, APPLICATION) !== 0) {
            $route = APPLICATION . '/' . $route;
        }

        if ($this->hasRoute($route) === true) {
            return $this->resolveRoute($route);
        }

        throw new UnresolvableRouteException(sprintf(
            "Error: Route '%s' could not be resolved to an action.",
            $route
        ));
    }
}
