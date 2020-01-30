<?php

declare(strict_types=1);

namespace Sypa\Generator\Builder;

use Sypa\Model\Address;
use Sypa\Model\AddressClassificationEnum;
use Sypa\Model\AddressValidationEnum;

class AddressBuilder {
    /**
     * @var int|null
     */
    private ?int $address_id;
    /**
     * @var string|null
     */
    private ?string $first_name;
    /**
     * @var string|null
     */
    private ?string $last_name;
    /**
     * @var string|null
     */
    private ?string $organization;
    /**
     * @var string|null
     */
    private ?string $street_1;
    /**
     * @var string|null
     */
    private ?string $street_2;
    /**
     * @var string|null
     */
    private ?string $city;
    /**
     * @var string|null
     */
    private ?string $postcode;
    /**
     * @var int|null
     */
    private ?int $country_id;
    /**
     * @var int|null
     */
    private ?int $zone_id;
    /**
     * @var AddressClassificationEnum|null
     */
    private ?AddressClassificationEnum $classification;
    /**
     * @var AddressValidationEnum|null
     */
    private ?AddressValidationEnum $validation;

    /**
     * @param int $address_id
     * @return AddressBuilder
     */
    public function withAddressId(int $address_id): self {
        $this->address_id = $address_id;

        return $this;
    }

    /**
     * @param string $first_name
     * @return AddressBuilder
     */
    public function withFirstName(string $first_name): self {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @param string $last_name
     * @return AddressBuilder
     */
    public function withLastName(string $last_name): self {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @param string $organization
     * @return AddressBuilder
     */
    public function withOrganization(string $organization): self {
        $this->organization = $organization;

        return $this;
    }

    /**
     * @param string $street_1
     * @return AddressBuilder
     */
    public function withStreet1(string $street_1): self {
        $this->street_1 = $street_1;

        return $this;
    }

    /**
     * @param string $street_2
     * @return AddressBuilder
     */
    public function withStreet2(string $street_2): self {
        $this->street_2 = $street_2;

        return $this;
    }

    /**
     * @param string $city
     * @return AddressBuilder
     */
    public function withCity(string $city): self {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string $postcode
     * @return AddressBuilder
     */
    public function withPostcode(string $postcode): self {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * @param int $country_id
     * @return AddressBuilder
     */
    public function withCountryId(int $country_id): self {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * @param int $zone_id
     * @return AddressBuilder
     */
    public function withZoneId(int $zone_id): self {
        $this->zone_id = $zone_id;

        return $this;
    }

    /**
     * @param AddressClassificationEnum $classification
     * @return AddressBuilder
     */
    public function withClassification(AddressClassificationEnum $classification): self {
        $this->classification = $classification;

        return $this;
    }

    /**
     * @param AddressValidationEnum $validation
     * @return AddressBuilder
     */
    public function withValidation(AddressValidationEnum $validation): self {
        $this->validation = $validation;

        return $this;
    }

    /**
     * @param Address $address
     * @return AddressBuilder
     */
    public function withAddress(Address $address): self {
        $this->address_id = $address->getAddressId();
        $this->first_name = $address->getFirstName();
        $this->last_name = $address->getLastName();
        $this->organization = $address->getOrganization();
        $this->street_1 = $address->getStreet1();
        $this->street_2 = $address->getStreet2();
        $this->city = $address->getCity();
        $this->postcode = $address->getPostcode();
        $this->country_id = $address->getCountryId();
        $this->zone_id = $address->getZoneId();
        $this->classification = $address->getClassification();
        $this->validation = $address->getValidation();

        return $this;
    }

    public function build(): Address {
        $address = new Address(
            $this->address_id,
            $this->first_name,
            $this->last_name,
            $this->organization,
            $this->street_1,
            $this->street_2,
            $this->city,
            $this->postcode,
            $this->country_id,
            $this->zone_id,
            $this->classification,
            $this->validation
        );

        $this->reset();

        return $address;
    }

    public function reset(): void {
        $this->address_id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->organization = null;
        $this->street_1 = null;
        $this->street_2 = null;
        $this->city = null;
        $this->postcode = null;
        $this->country_id = null;
        $this->zone_id = null;
        $this->classification = null;
        $this->validation = null;
    }
}
