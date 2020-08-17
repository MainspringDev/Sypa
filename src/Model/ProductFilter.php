<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductFilter {
    private int $product_id;
    private int $filter_id;

    public function __construct(int $product_id, int $filter_id) {
        $this->product_id = $product_id;
        $this->filter_id = $filter_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getFilterId(): int {
        return $this->filter_id;
    }
}
