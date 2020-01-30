<?php

namespace Sypa\Service\View;

use Symfony\Component\HttpFoundation\Response;

interface ViewInterface {
    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, $value): void;

    /**
     * @param array $data
     * @param string $template
     * @return Response
     */
    public function render(array $data, string $template): Response;
}
