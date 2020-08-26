<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class DownloadReport {
    private int $download_report_id;
    private int $download_id;
    private int $store_id;
    private string $ip;
    private string $country;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $download_report_id,
        int $download_id,
        int $store_id,
        string $ip,
        string $country,
        \DateTimeImmutable $date_added
    ) {
        $this->download_report_id = $download_report_id;
        $this->download_id = $download_id;
        $this->store_id = $store_id;
        $this->ip = $ip;
        $this->country = $country;
        $this->date_added = $date_added;
    }

    public function getDownloadReportId(): int {
        return $this->download_report_id;
    }

    public function getDownloadId(): int {
        return $this->download_id;
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
