<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductImage {
    private int $product_image_id;
    private int $product_id;
    private string $image;
    private int $sort_order;

    public function __construct(int $product_image_id, int $product_id, string $image, int $sort_order) {
        $this->product_image_id = $product_image_id;
        $this->product_id = $product_id;
        $this->image = $image;
        $this->sort_order = $sort_order;
    }

    public function getProductImageId(): int {
        return $this->product_image_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
