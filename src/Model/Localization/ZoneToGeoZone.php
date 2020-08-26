<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class ZoneToGeoZone {
    private int $zone_to_geo_zone_id;
    private int $country_id;
    private int $zone_id;
    private int $geo_zone_id;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $zone_to_geo_zone_id,
        int $country_id,
        int $zone_id,
        int $geo_zone_id,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->zone_to_geo_zone_id = $zone_to_geo_zone_id;
        $this->country_id = $country_id;
        $this->zone_id = $zone_id;
        $this->geo_zone_id = $geo_zone_id;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getZoneToGeoZoneId(): int {
        return $this->zone_to_geo_zone_id;
    }

    public function getCountryId(): int {
        return $this->country_id;
    }

    public function getZoneId(): int {
        return $this->zone_id;
    }

    public function getGeoZoneId(): int {
        return $this->geo_zone_id;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
