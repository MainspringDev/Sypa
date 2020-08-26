<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductReward {
    private int $product_reward_id;
    private int $product_id;
    private int $customer_group_id;
    private int $points;

    public function __construct(int $product_reward_id, int $product_id, int $customer_group_id, int $points) {
        $this->product_reward_id = $product_reward_id;
        $this->product_id = $product_id;
        $this->customer_group_id = $customer_group_id;
        $this->points = $points;
    }

    public function getProductRewardId(): int {
        return $this->product_reward_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function getPoints(): int {
        return $this->points;
    }
}
