<?php

declare(strict_types=1);

namespace Sypa\Model;

use Sypa\Exception\InvalidResourceIdentifierException;

class Address {
    /**
     * @var int
     */
    private $address_id;
    /**
     * @var string
     */
    private $first_name;
    /**
     * @var string
     */
    private $last_name;
    /**
     * @var string
     */
    private $organization;
    /**
     * @var string
     */
    private $street_1;
    /**
     * @var string
     */
    private $street_2;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $postcode;
    /**
     * @var int
     */
    private $country_id;
    /**
     * @var int
     */
    private $zone_id;
    /**
     * @var AddressClassificationEnum
     */
    private $classification;
    /**
     * @var AddressValidationEnum
     */
    private $validation;

    /**
     * @param int $address_id
     * @param string $first_name
     * @param string $last_name
     * @param string $organization
     * @param string $street_1
     * @param string $street_2
     * @param string $city
     * @param string $postcode
     * @param int $country_id
     * @param int $zone_id
     * @param AddressClassificationEnum $classification
     * @param AddressValidationEnum $validation
     */
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

    /**
     * @return int
     */
    public function getAddressId(): int {
        return $this->address_id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getOrganization(): string {
        return $this->organization;
    }

    /**
     * @return string
     */
    public function getStreet1(): string {
        return $this->street_1;
    }

    /**
     * @return string
     */
    public function getStreet2(): string {
        return $this->street_2;
    }

    /**
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostcode(): string {
        return $this->postcode;
    }

    /**
     * @return int
     */
    public function getCountryId(): int {
        return $this->country_id;
    }

    /**
     * @return int
     */
    public function getZoneId(): int {
        return $this->zone_id;
    }

    /**
     * @return AddressClassificationEnum
     */
    public function getClassification(): AddressClassificationEnum {
        return $this->classification;
    }

    /**
     * @return AddressValidationEnum
     */
    public function getValidation(): AddressValidationEnum {
        return $this->validation;
    }
}
