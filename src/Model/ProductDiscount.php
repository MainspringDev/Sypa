<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductDiscount {
    /**
     * @var int
     */
    private int $product_discount_id;
    /**
     * @var int
     */
    private int $product_id;
    /**
     * @var int
     */
    private int $customer_group_id;
    /**
     * @var int
     */
    private int $quantity;
    /**
     * @var int
     */
    private int $priority;
    /**
     * @var float
     */
    private float $price;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_start;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_end;

    /**
     * @param int $product_discount_id
     * @param int $product_id
     * @param int $customer_group_id
     * @param int $quantity
     * @param int $priority
     * @param float $price
     * @param \DateTimeImmutable $date_start
     * @param \DateTimeImmutable $date_end
     */
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

    /**
     * @return int
     */
    public function getProductDiscountId(): int {
        return $this->product_discount_id;
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
    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateStart(): \DateTimeImmutable {
        return $this->date_start;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateEnd(): \DateTimeImmutable {
        return $this->date_end;
    }
}
