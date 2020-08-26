<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductToCategory {
    private int $product_id;
    private int $category_id;

    public function __construct(int $product_id, int $category_id) {
        $this->product_id = $product_id;
        $this->category_id = $category_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }
}
