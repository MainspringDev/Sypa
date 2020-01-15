<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductRelated {
    /**
     * @var int
     */
    private int $product_id;
    /**
     * @var int
     */
    private int $related_id;

    /**
     * @param int $product_id
     * @param int $related_id
     */
    public function __construct(int $product_id, int $related_id) {
        $this->product_id = $product_id;
        $this->related_id = $related_id;
    }

    /**
     * @return int
     */
    public function getProductId(): int {
        return $this->product_id;
    }

    /**
     * @return int
     */
    public function getRelatedId(): int {
        return $this->related_id;
    }
}
