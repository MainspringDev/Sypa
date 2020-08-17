<?php

declare(strict_types=1);

namespace Sypa\Model;

class CouponHistory {
    private int $coupon_history_id;
    private int $coupon_id;
    private int $order_id;
    private int $customer_id;
    private float $amount;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $coupon_history_id,
        int $coupon_id,
        int $order_id,
        int $customer_id,
        float $amount,
        \DateTimeImmutable $date_added
    ) {
        $this->coupon_history_id = $coupon_history_id;
        $this->coupon_id = $coupon_id;
        $this->order_id = $order_id;
        $this->customer_id = $customer_id;
        $this->amount = $amount;
        $this->date_added = $date_added;
    }

    public function getCouponHistoryId(): int {
        return $this->coupon_history_id;
    }

    public function getCouponId(): int {
        return $this->coupon_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
