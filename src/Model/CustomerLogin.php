<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomerLogin {
    private int $customer_login_id;
    private string $email;
    private string $ip;
    private int $total;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $customer_login_id,
        string $email,
        string $ip,
        int $total,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->customer_login_id = $customer_login_id;
        $this->email = $email;
        $this->ip = $ip;
        $this->total = $total;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getCustomerLoginId(): int {
        return $this->customer_login_id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getTotal(): int {
        return $this->total;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
