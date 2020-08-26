<?php

declare(strict_types=1);

namespace Sypa\Model\Marketing;

class CouponCategory {
    private int $coupon_id;
    private int $category_id;

    public function __construct(int $coupon_id, int $category_id) {
        $this->coupon_id = $coupon_id;
        $this->category_id = $category_id;
    }

    public function getCouponId(): int {
        return $this->coupon_id;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }
}
