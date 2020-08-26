<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerAffiliateReport {
    private int $customer_affiliate_report_id;
    private int $customer_id;
    private int $store_id;
    private string $ip;
    private string $country;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $customer_affiliate_report_id,
        int $customer_id,
        int $store_id,
        string $ip,
        string $country,
        \DateTimeImmutable $date_added
    ) {
        $this->customer_affiliate_report_id = $customer_affiliate_report_id;
        $this->customer_id = $customer_id;
        $this->store_id = $store_id;
        $this->ip = $ip;
        $this->country = $country;
        $this->date_added = $date_added;
    }

    public function getCustomerAffiliateReportId(): int {
        return $this->customer_affiliate_report_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getCountry(): string {
        return $this->country;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
