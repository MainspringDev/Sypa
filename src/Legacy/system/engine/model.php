<?php

namespace OpenCart\System\Engine;

use OpenCart\System\Library\Config;
use OpenCart\System\Library\DB;

/**
 * @property Config $config
 * @property DB $db
 * @property Loader $load
 */
abstract class Model {
    /**
     * @var Registry
     */
    protected $registry;

    public function __construct(Registry $registry) {
        $this->registry = $registry;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function __get(string $key) {
        return $this->registry->get($key);
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function __set(string $key, $value): void {
        $this->registry->set($key, $value);
    }
}
