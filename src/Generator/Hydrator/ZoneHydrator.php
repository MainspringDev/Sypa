<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Localization\Zone;

class ZoneHydrator {
    const REQUIRED_DATA = [
        'zone_id',
        'country_id',
        'name',
        'code',
        'status'
    ];

    public function hydrate(array $data): Zone {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create zone from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'zone_id'    => $zone_id,
            'country_id' => $country_id,
            'name'       => $name,
            'code'       => $code,
            'status'     => $status
        ) = $data;

        return new Zone(
            $zone_id,
            $country_id,
            $name,
            $code,
            $status
        );
    }

    /**
     * @param Zone $zone
     * @return array<string, mixed>
     */
    public function extract(Zone $zone): array {
        return [
            'zone_id'    => $zone->getZoneId(),
            'country_id' => $zone->getCountryId(),
            'name'       => $zone->getName(),
            'code'       => $zone->getCode(),
            'status'     => $zone->isStatus()
        ];
    }
}
