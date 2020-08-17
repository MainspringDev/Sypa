<?php

declare(strict_types=1);

namespace Sypa\Model;

class TaxRate {
    private int $tax_rate_id;
    private int $geo_zone_id;
    private string $name;
    private float $rate;
    private $type;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $tax_rate_id,
        int $geo_zone_id,
        string $name,
        float $rate,
        $type,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->tax_rate_id = $tax_rate_id;
        $this->geo_zone_id = $geo_zone_id;
        $this->name = $name;
        $this->rate = $rate;
        $this->type = $type;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getTaxRateId(): int {
        return $this->tax_rate_id;
    }

    public function getGeoZoneId(): int {
        return $this->geo_zone_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getRate(): float {
        return $this->rate;
    }

    public function getType() {
        return $this->type;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
