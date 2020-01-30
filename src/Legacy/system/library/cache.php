<?php

namespace OpenCart\System\Library;

class Cache {
    private $adaptor;

    /**
     * @param string $adaptor
     * @param int $expire
     * @throws \Exception
     */
    public function __construct($adaptor, $expire = 3600) {
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
    public function get($key) {
        return $this->adaptor->get($key);
    }

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value) {
        return $this->adaptor->set($key, $value);
    }

    /**
     * @param $key
     * @return bool
     */
    public function delete($key) {
        return $this->adaptor->delete($key);
    }
}
