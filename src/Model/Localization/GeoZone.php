<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class GeoZone {
    private int $geo_zone_id;
    private string $name;
    private string $description;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $geo_zone_id,
        string $name,
        string $description,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->geo_zone_id = $geo_zone_id;
        $this->name = $name;
        $this->description = $description;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getGeoZoneId(): int {
        return $this->geo_zone_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
