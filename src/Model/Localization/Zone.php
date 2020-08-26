<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class Zone {
    private int $zone_id;
    private int $country_id;
    private string $name;
    private string $code;
    private bool $status;

    public function __construct(int $zone_id, int $country_id, string $name, string $code, bool $status) {
        $this->zone_id = $zone_id;
        $this->country_id = $country_id;
        $this->name = $name;
        $this->code = $code;
        $this->status = $status;
    }

    public function getZoneId(): int {
        return $this->zone_id;
    }

    public function getCountryId(): int {
        return $this->country_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function isStatus(): bool {
        return $this->status;
    }
}
