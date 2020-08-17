<?php

declare(strict_types=1);

namespace Sypa\Model;

class MarketingReport {
    private int $marketing_report_id;
    private int $marketing_id;
    private int $store_id;
    private string $ip;
    private string $country;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $marketing_report_id,
        int $marketing_id,
        int $store_id,
        string $ip,
        string $country,
        \DateTimeImmutable $date_added
    ) {
        $this->marketing_report_id = $marketing_report_id;
        $this->marketing_id = $marketing_id;
        $this->store_id = $store_id;
        $this->ip = $ip;
        $this->country = $country;
        $this->date_added = $date_added;
    }

    public function getMarketingReportId(): int {
        return $this->marketing_report_id;
    }

    public function getMarketingId(): int {
        return $this->marketing_id;
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
