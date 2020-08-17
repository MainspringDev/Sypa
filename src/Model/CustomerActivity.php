<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomerActivity {
    private int $customer_activity_id;
    private int $customer_id;
    private string $key;
    private string $data;
    private string $ip;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $customer_activity_id,
        int $customer_id,
        string $key,
        string $data,
        string $ip,
        \DateTimeImmutable $date_added
    ) {
        $this->customer_activity_id = $customer_activity_id;
        $this->customer_id = $customer_id;
        $this->key = $key;
        $this->data = $data;
        $this->ip = $ip;
        $this->date_added = $date_added;
    }

    public function getCustomerActivityId(): int {
        return $this->customer_activity_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getKey(): string {
        return $this->key;
    }

    public function getData(): string {
        return $this->data;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
