<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Localization;

use Sypa\Model\Localization\Country;

class CountryHydrator {
    const REQUIRED_DATA = [
        'country_id',
        'name',
        'iso_code_2',
        'iso_code_3',
        'address_format',
        'postcode_format',
        'status'
    ];

    public function hydrate(array $data): Country {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create country from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'country_id'        => $country_id,
            'name'              => $name,
            'iso_code_2'        => $iso_code_2,
            'iso_code_3'        => $iso_code_3,
            'address_format'    => $address_format,
            'postcode_required' => $postcode_format,
            'status'            => $status
        ) = $data;

        return new Country(
            $country_id,
            $name,
            $iso_code_2,
            $iso_code_3,
            $address_format,
            $postcode_format,
            $status
        );
    }

    /**
     * @param Country $country
     * @return array<string, mixed>
     */
    public function extract(Country $country): array {
        return [
            'country_id'        => $country->getCountryId(),
            'name'              => $country->getName(),
            'iso_code_2'        => $country->getIsoCode2(),
            'iso_code_3'        => $country->getIsoCode3(),
            'address_format'    => $country->getAddressFormat(),
            'postcode_required' => $country->isPostcodeRequired(),
            'status'            => $country->isStatus()
        ];
    }
}
