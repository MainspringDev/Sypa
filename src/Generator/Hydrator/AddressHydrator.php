<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Account\Address;
use Sypa\Model\Account\AddressClassificationEnum;
use Sypa\Model\Account\AddressValidationEnum;

class AddressHydrator {
    const REQUIRED_DATA = [
        'address_id',
        'first_name',
        'last_name',
        'organization',
        'street_1',
        'street_2',
        'city',
        'postcode',
        'country_id',
        'zone_id',
        'classification',
        'validation'
    ];

    public function hydrate(array $data): Address {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create address from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'address_id'     => $address_id,
            'first_name'     => $first_name,
            'last_name'      => $last_name,
            'organization'   => $organization,
            'street_1'       => $street_1,
            'street_2'       => $street_2,
            'city'           => $city,
            'postcode'       => $postcode,
            'country_id'     => $country_id,
            'zone_id'        => $zone_id,
            'classification' => $classification,
            'validation'     => $validation
        ) = $data;

        return new Address(
            $address_id,
            $first_name,
            $last_name,
            $organization,
            $street_1,
            $street_2,
            $city,
            $postcode,
            $country_id,
            $zone_id,
            new AddressClassificationEnum($classification),
            new AddressValidationEnum($validation)
        );
    }

    /**
     * @param Address $address
     * @return array<string, mixed>
     */
    public function extract(Address $address): array {
        return [
            'address_id'     => $address->getAddressId(),
            'first_name'     => $address->getFirstName(),
            'last_name'      => $address->getLastName(),
            'organization'   => $address->getOrganization(),
            'street_1'       => $address->getStreet1(),
            'street_2'       => $address->getStreet2(),
            'city'           => $address->getCity(),
            'postcode'       => $address->getPostcode(),
            'country_id'     => $address->getCountryId(),
            'zone_id'        => $address->getZoneId(),
            'classification' => $address->getClassification()->getValue(),
            'validation'     => $address->getValidation()->getValue()
        ];
    }
}
