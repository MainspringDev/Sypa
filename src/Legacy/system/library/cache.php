<?php

namespace OpenCart\System\Library;

class Cache {
    private $adaptor;

    /**
     * @param string $adaptor
     * @param int $expire
     * @throws \Exception
     */
    public function __construct(string $adaptor, int $expire = 3600) {
        $class = $adaptor;

        if (class_exists($class)) {
            $this->adaptor = new $class($expire);
        } else {
            throw new \Exception('Error: Could not load cache adaptor ' . $adaptor . ' cache!');
        }
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key) {
        return $this->adaptor->get($key);
    }

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function set(string $key, $value) {
        return $this->adaptor->set($key, $value);
    }

    /**
     * @param $key
     * @return bool
     */
    public function delete($key): bool {
        return $this->adaptor->delete($key);
    }
}
