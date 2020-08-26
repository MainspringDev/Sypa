<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerWishlist {
    private int $customer_id;
    private int $product_id;
    private \DateTimeImmutable $date_added;

    public function __construct(int $customer_id, int $product_id, \DateTimeImmutable $date_added) {
        $this->customer_id = $customer_id;
        $this->product_id = $product_id;
        $this->date_added = $date_added;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
