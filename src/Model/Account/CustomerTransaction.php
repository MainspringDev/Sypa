<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerTransaction {
    private int $customer_transaction_id;
    private int $customer_id;
    private int $order_id;
    private string $description;
    private float $amount;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $customer_transaction_id,
        int $customer_id,
        int $order_id,
        string $description,
        float $amount,
        \DateTimeImmutable $date_added
    ) {
        $this->customer_transaction_id = $customer_transaction_id;
        $this->customer_id = $customer_id;
        $this->order_id = $order_id;
        $this->description = $description;
        $this->amount = $amount;
        $this->date_added = $date_added;
    }

    public function getCustomerTransactionId(): int {
        return $this->customer_transaction_id;
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

    public function getAmount(): float {
        return $this->amount;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
