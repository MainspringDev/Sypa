<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerReward {
    private int $customer_reward_id;
    private int $customer_id;
    private int $order_id;
    private string $description;
    private int $points;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $customer_reward_id,
        int $customer_id,
        int $order_id,
        string $description,
        int $points,
        \DateTimeImmutable $date_added
    ) {
        $this->customer_reward_id = $customer_reward_id;
        $this->customer_id = $customer_id;
        $this->order_id = $order_id;
        $this->description = $description;
        $this->points = $points;
        $this->date_added = $date_added;
    }

    public function getCustomerRewardId(): int {
        return $this->customer_reward_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPoints(): int {
        return $this->points;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
