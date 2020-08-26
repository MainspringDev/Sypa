<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerHistory {
    private int $customer_history_id;
    private int $customer_id;
    private string $comment;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $customer_history_id,
        int $customer_id,
        string $comment,
        \DateTimeImmutable $date_added
    ) {
        $this->customer_history_id = $customer_history_id;
        $this->customer_id = $customer_id;
        $this->comment = $comment;
        $this->date_added = $date_added;
    }

    public function getCustomerHistoryId(): int {
        return $this->customer_history_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getComment(): string {
        return $this->comment;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
