<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class WishList {
    private int $customer_id;
    private int $product_id;
    private \DateTimeImmutable $dateAdded;

    public function __construct(int $customer_id, int $product_id, \DateTimeImmutable $dateAdded) {
        $this->customer_id = $customer_id;
        $this->product_id = $product_id;
        $this->dateAdded = $dateAdded;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->dateAdded;
    }
}
