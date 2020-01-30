<?php

namespace OpenCart\System\Library;

class Language {
    private $default = 'en-gb';
    private $directory;
    public $data = array();

    /**
     * @param string $directory
     */
    public function __construct(string $directory = '') {
        $this->directory = $directory;
    }

    /**
     * @param string $key
     * @return string|array @todo See self::set() receiving an array
     */
    public function get($key) {
        return (isset($this->data[$key]) ? $this->data[$key] : $key);
    }

    /**
     *  Set language text string
     *
     * @param string $key
     * @param string|mixed $value  @todo Some codes sends an array
     * @return void
     */
    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    /**
     * @return array
     */
    public function all() {
        return $this->data;
    }

    /**
     * @param string $filename
     * @param string $prefix
     * @return array
     */
    public function load($filename, $prefix = '') {
        $_ = array();

        $file = DIR_LANGUAGE . $this->default . '/' . $filename . '.php';

        if (is_file($file)) {
            require($file);
        }

        $file = DIR_LANGUAGE . $this->directory . '/' . $filename . '.php';

        if (is_file($file)) {
            require($file);
        }

        if ($prefix) {
            foreach ($_ as $key => $value) {
                $_[$prefix . '_' . $key] = $value;

                unset($_[$key]);
            }
        }

        $this->data = array_merge($this->data, $_);

        return $this->data;
    }
}
