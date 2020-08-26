<?php

declare(strict_types=1);

namespace Sypa\Model\Marketing;

class CouponProduct {
    private int $coupon_product_id;
    private int $coupon_id;
    private int $product_id;

    public function __construct(int $coupon_product_id, int $coupon_id, int $product_id) {
        $this->coupon_product_id = $coupon_product_id;
        $this->coupon_id = $coupon_id;
        $this->product_id = $product_id;
    }

    public function getCouponProductId(): int {
        return $this->coupon_product_id;
    }

    public function getCouponId(): int {
        return $this->coupon_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }
}
