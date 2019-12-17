<?php

declare(strict_types=1);

namespace Sypa\Catalog\product;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController {
    public function index(Request $request): Response {}

    public function write(Request $request): Response {}
}
