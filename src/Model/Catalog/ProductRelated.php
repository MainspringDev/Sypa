<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductRelated {
    private int $product_id;
    private int $related_id;

    public function __construct(int $product_id, int $related_id) {
        $this->product_id = $product_id;
        $this->related_id = $related_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getRelatedId(): int {
        return $this->related_id;
    }
}
