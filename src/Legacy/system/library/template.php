<?php

namespace OpenCart\System\Library;

use OpenCart\System\Library\Template\Template as PhpTemplate;
use OpenCart\System\Library\Template\Twig;

class Template {
    /**
     * @var PhpTemplate|Twig
     */
    private $adaptor;

    /**
     * @param string $adaptor
     * @throws \Exception
     */
    public function __construct($adaptor) {
        $class = $adaptor;

        if (class_exists($class)) {
            $this->adaptor = new $class();
        } else {
            throw new \Exception('Error: Could not load template adaptor ' . $adaptor . '!');
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value) {
        $this->adaptor->set($key, $value);
    }

    /**
     * @param string $filename
     * @param string $code
     * @return string|false
     * @throws \Exception
     */
    public function render($filename, $code = '') {
        return $this->adaptor->render($filename, $code);
    }
}
