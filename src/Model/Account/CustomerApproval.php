<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerApproval {
    private int $customer_approval_id;
    private int $customer_id;
    private string $type;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $customer_approval_id,
        int $customer_id,
        string $type,
        \DateTimeImmutable $date_added
    ) {
        $this->customer_approval_id = $customer_approval_id;
        $this->customer_id = $customer_id;
        $this->type = $type;
        $this->date_added = $date_added;
    }

    public function getCustomerApprovalId(): int {
        return $this->customer_approval_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
