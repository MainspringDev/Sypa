<?php

namespace OpenCart\System\Engine;

use DI\Container;
use Psr\Container\ContainerInterface;

final class Registry implements ContainerInterface {
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
     * @param string $key
     * @return mixed|null
     */
    public function get($key) {
        try {
            return ($this->container->has($key) ? $this->container->get($key) : null);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value): void {
        $this->container->set($key, $value);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has($key): bool {
        return $this->container->has($key);
    }
}
