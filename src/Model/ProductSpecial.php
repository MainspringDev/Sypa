<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductSpecial {
    private int $product_special_id;
    private int $product_id;
    private int $customer_group_id;
    private int $priority;
    private float $price;
    private \DateTimeImmutable $date_start;
    private \DateTimeImmutable $date_end;

    public function __construct(
        int $product_special_id,
        int $product_id,
        int $customer_group_id,
        int $priority,
        float $price,
        \DateTimeImmutable $date_start,
        \DateTimeImmutable $date_end
    ) {
        $this->product_special_id = $product_special_id;
        $this->product_id = $product_id;
        $this->customer_group_id = $customer_group_id;
        $this->priority = $priority;
        $this->price = $price;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
    }

    public function getProductSpecialId(): int {
        return $this->product_special_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function getPriority(): int {
        return $this->priority;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getDateStart(): \DateTimeImmutable {
        return $this->date_start;
    }

    public function getDateEnd(): \DateTimeImmutable {
        return $this->date_end;
    }
}
