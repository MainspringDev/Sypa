<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductToStore {
    private int $product_id;
    private int $store_id;

    public function __construct(int $product_id, int $store_id) {
        $this->product_id = $product_id;
        $this->store_id = $store_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }
}
