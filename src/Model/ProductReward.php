<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductReward {
    /**
     * @var int
     */
    private int $product_reward_id;
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
    private int $points;

    /**
     * @param int $product_reward_id
     * @param int $product_id
     * @param int $customer_group_id
     * @param int $points
     */
    public function __construct(int $product_reward_id, int $product_id, int $customer_group_id, int $points) {
        $this->product_reward_id = $product_reward_id;
        $this->product_id = $product_id;
        $this->customer_group_id = $customer_group_id;
        $this->points = $points;
    }

    /**
     * @return int
     */
    public function getProductRewardId(): int {
        return $this->product_reward_id;
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
    public function getPoints(): int {
        return $this->points;
    }
}
