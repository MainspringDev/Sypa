<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

use Sypa\Exception\InvalidResourceIdentifierException;

class Address {
    private int $address_id;
    private string $first_name;
    private string $last_name;
    private string $organization;
    private string $street_1;
    private string $street_2;
    private string $city;
    private string $postcode;
    private int $country_id;
    private int $zone_id;
    private AddressClassificationEnum $classification;
    private AddressValidationEnum $validation;

    public function __construct(
        int $address_id,
        string $first_name,
        string $last_name,
        string $organization,
        string $street_1,
        string $street_2,
        string $city,
        string $postcode,
        int $country_id,
        int $zone_id,
        AddressClassificationEnum $classification,
        AddressValidationEnum $validation
    ) {
        if ($address_id < 1) {
            throw new InvalidResourceIdentifierException(sprintf(
                "Address ID must be a positive integer. ID %s received.",
                $address_id
            ));
        }

        $this->address_id = $address_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->organization = $organization;
        $this->street_1 = $street_1;
        $this->street_2 = $street_2;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->country_id = $country_id;
        $this->zone_id = $zone_id;
        $this->classification = $classification;
        $this->validation = $validation;
    }

    public function getAddressId(): int {
        return $this->address_id;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function getOrganization(): string {
        return $this->organization;
    }

    public function getStreet1(): string {
        return $this->street_1;
    }

    public function getStreet2(): string {
        return $this->street_2;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function getPostcode(): string {
        return $this->postcode;
    }

    public function getCountryId(): int {
        return $this->country_id;
    }

    public function getZoneId(): int {
        return $this->zone_id;
    }

    public function getClassification(): AddressClassificationEnum {
        return $this->classification;
    }

    public function getValidation(): AddressValidationEnum {
        return $this->validation;
    }
}
