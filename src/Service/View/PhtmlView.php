<?php

declare(strict_types=1);

namespace Sypa\Service\View;

use Symfony\Component\HttpFoundation\Response;

class PhtmlView implements ViewInterface {
    /**
     * @var mixed[]
     */
    private array $data = [];

    public function set(string $key, $value): void {
        $this->data[$key] = $value;
    }

    public function render(array $data, string $template): Response {
        // TODO: Implement render() method.
    }


}
