<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerOnline {
    private string $ip;
    private int $customer_id;
    private string $url;
    private string $referer;
    private \DateTimeImmutable $date_added;

    public function __construct(
        string $ip,
        int $customer_id,
        string $url,
        string $referer,
        \DateTimeImmutable $date_added
    ) {
        $this->ip = $ip;
        $this->customer_id = $customer_id;
        $this->url = $url;
        $this->referer = $referer;
        $this->date_added = $date_added;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getReferer(): string {
        return $this->referer;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
