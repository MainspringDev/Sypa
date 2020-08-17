<?php

declare(strict_types=1);

namespace Sypa\Model;

class Country {
    private int $country_id;
    private string $name;
    private string $iso_code_2;
    private string $iso_code_3;
    private string $address_format;
    private bool $postcode_required;
    private bool $status;

    public function __construct(
        int $country_id,
        string $name,
        string $iso_code_2,
        string $iso_code_3,
        string $address_format,
        bool $postcode_required,
        bool $status
    ) {
        $this->country_id = $country_id;
        $this->name = $name;
        $this->iso_code_2 = $iso_code_2;
        $this->iso_code_3 = $iso_code_3;
        $this->address_format = $address_format;
        $this->postcode_required = $postcode_required;
        $this->status = $status;
    }

    public function getCountryId(): int {
        return $this->country_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getIsoCode2(): string {
        return $this->iso_code_2;
    }

    public function getIsoCode3(): string {
        return $this->iso_code_3;
    }

    public function getAddressFormat(): string {
        return $this->address_format;
    }

    public function isPostcodeRequired(): bool {
        return $this->postcode_required;
    }

    public function isStatus(): bool {
        return $this->status;
    }
}
