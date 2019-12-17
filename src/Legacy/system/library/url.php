<?php

namespace OpenCart\System\Library;

use OpenCart\System\Engine\Controller;

class Url {
    /**
     * @var string
     */
    private $url;
    /**
     * @var Controller[]
     */
    private $rewrite = array();

    /**
     * @param string $url
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    /**
     *	Add a rewrite method to the URL system
     *
     * @param Controller $rewrite
     * @return void
     */
    public function addRewrite(Controller $rewrite): void {
        $this->rewrite[] = $rewrite;
    }

    /**
     * Generates a URL
     *
     * @param string $route
     * @param string|array $args
     * @param bool $js
     * @return string
     */
    public function link(string $route, $args = '', bool $js = false): string {
        $url = $this->url . 'index.php?route=' . (string)$route;

        if ($args) {
            if (!$js) {
                $amp = '&amp;';
            } else {
                $amp = '&';
            }

            if (is_array($args)) {
                $url .= $amp . http_build_query($args, '', $amp);
            } else {
                $url .= str_replace('&', $amp, '&' . ltrim($args, '&'));
            }
        }

        foreach ($this->rewrite as $rewrite) {
            $url = $rewrite->rewrite($url);
        }

        return $url;
    }
}
