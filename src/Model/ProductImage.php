<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductImage {
    /**
     * @var int
     */
    private int $product_image_id;
    /**
     * @var int
     */
    private int $product_id;
    /**
     * @var string
     */
    private string $image;
    /**
     * @var int
     */
    private int $sort_order;
}
