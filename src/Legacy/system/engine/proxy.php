<?php

namespace OpenCart\System\Engine;

class Proxy {
    /**
     * @var array
     */
    private $data = array();

    /**
     * @param string $key
     * @return mixed
     */
    public function &__get(string $key) {
        return $this->data[$key];
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function attach(string $key, &$value): void {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set(string $key, $value): void {
        $this->data[$key] = $value;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call(string $method, array $args) {
        // Hack for pass-by-reference
        foreach ($args as $key => &$value);
        // @todo Deal with warning
        // Warning: Parameter 1 to OpenCart\System\Engine\Loader::OpenCart\System\Engine\{closure}() expected to be a reference, value given in /{path}/src/Legacy/system/engine/proxy.php on line 47

        if (isset($this->data[$method])) {
            return call_user_func_array($this->data[$method], $args);
        }

        $trace = debug_backtrace();

        exit('<b>Notice</b>:  Undefined property: Proxy::' . $key . ' in <b>' . $trace[1]['file'] . '</b> on line <b>' . $trace[1]['line'] . '</b>');
    }
}
