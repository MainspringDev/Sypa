<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Localization;

use Sypa\Model\Localization\Location;

class LocationHydrator {
    const REQUIRED_DATA = [
        'location_id',
        'name',
        'address',
        'telephone',
        'fax',
        'geocode',
        'image',
        'open',
        'comment'
    ];

    /**
     * @param array $data
     * @return Location
     * @throws \Exception
     */
    public function hydrate(array $data): Location {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create location from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'location_id' => $location_id,
            'name'        => $name,
            'address'     => $address,
            'telephone'   => $telephone,
            'fax'         => $fax,
            'geocode'     => $geocode,
            'image'       => $image,
            'open'        => $open,
            'comment'     => $comment
        ) = $data;

        return new Location($location_id, $name, $address, $telephone, $fax, $geocode, $image, $open, $comment);
    }

    /**
     * @param Location $location
     * @return array<string, mixed>
     */
    public function extract(Location $location): array {
        return [
            'location_id' => $location->getLocationId(),
            'name'        => $location->getName(),
            'address'     => $location->getAddress(),
            'telephone'   => $location->getTelephone(),
            'fax'         => $location->getFax(),
            'geocode'     => $location->getGeocode(),
            'image'       => $location->getImage(),
            'open'        => $location->getOpen(),
            'comment'     => $location->getComment()
        ];
    }
}
