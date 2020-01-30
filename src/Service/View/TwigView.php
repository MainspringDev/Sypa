<?php

declare(strict_types=1);

namespace Sypa\Service\View;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;

class TwigView implements ViewInterface {
    /**
     * @var TwigEnvironment
     */
    private TwigEnvironment $twig;
    /**
     * @var mixed[]
     */
    private array $data = [];

    public function __construct(TwigEnvironment $twig) {
        $this->twig = $twig;
    }

    public function set(string $key, $value): void {
        $this->data[$key] = $value;
    }

    public function render(array $data, string $template, int $status = 200, array $headers = []): Response {
        $twigTemplate = $this->twig->load($template);

        $rendered = $twigTemplate->render($data);

        return new Response($rendered, $status, $headers);
    }
}
