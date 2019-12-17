<?php

namespace OpenCart\System\Library;

class Config {
    private $data = array();

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key) {
        return (isset($this->data[$key]) ? $this->data[$key] : null);
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     */
    public function set(string $key, $value): void {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool {
        return isset($this->data[$key]);
    }

    /**
     * @param string $filename
     * @return void
     */
    public function load(string $filename): void {
        $file = DIR_CONFIG . $filename . '.php';

        if (file_exists($file)) {
            $_ = array();

            $result = require($file);

            if (is_array($result)) {
                $this->data = array_merge($this->data, $result);
            } else {
                $this->data = array_merge($this->data, $_);
            }
        } else {
            trigger_error('Error: Could not load config ' . $filename . '!');
            exit();
        }
    }
}
