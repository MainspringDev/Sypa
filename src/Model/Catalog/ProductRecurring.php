<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductRecurring {
    private int $product_id;
    private int $recurring_id;
    private int $customer_group_id;

    public function __construct(int $product_id, int $recurring_id, int $customer_group_id) {
        $this->product_id = $product_id;
        $this->recurring_id = $recurring_id;
        $this->customer_group_id = $customer_group_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getRecurringId(): int {
        return $this->recurring_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }
}
