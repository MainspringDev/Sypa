<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductDiscount {
    private int $product_discount_id;
    private int $product_id;
    private int $customer_group_id;
    private int $quantity;
    private int $priority;
    private float $price;
    private \DateTimeImmutable $date_start;
    private \DateTimeImmutable $date_end;

    public function __construct(
        int $product_discount_id,
        int $product_id,
        int $customer_group_id,
        int $quantity,
        int $priority,
        float $price,
        \DateTimeImmutable $date_start,
        \DateTimeImmutable $date_end
    ) {
        $this->product_discount_id = $product_discount_id;
        $this->product_id = $product_id;
        $this->customer_group_id = $customer_group_id;
        $this->quantity = $quantity;
        $this->priority = $priority;
        $this->price = $price;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
    }

    public function getProductDiscountId(): int {
        return $this->product_discount_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function getQuantity(): int {
        return $this->quantity;
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
