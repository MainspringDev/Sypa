<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class Location {
    private int $location_id;
    private string $name;
    private string $address;
    private string $telephone;
    private string $fax;
    private string $geocode;
    private string $image;
    private string $open;
    private string $comment;

    public function __construct(
        int $location_id,
        string $name,
        string $address,
        string $telephone,
        string $fax,
        string $geocode,
        string $image,
        string $open,
        string $comment
    ) {
        $this->location_id = $location_id;
        $this->name = $name;
        $this->address = $address;
        $this->telephone = $telephone;
        $this->fax = $fax;
        $this->geocode = $geocode;
        $this->image = $image;
        $this->open = $open;
        $this->comment = $comment;
    }

    public function getLocationId(): int {
        return $this->location_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getTelephone(): string {
        return $this->telephone;
    }

    public function getFax(): string {
        return $this->fax;
    }

    public function getGeocode(): string {
        return $this->geocode;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getOpen(): string {
        return $this->open;
    }

    public function getComment(): string {
        return $this->comment;
    }
}
