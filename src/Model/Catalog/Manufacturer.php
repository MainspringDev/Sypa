<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class Manufacturer {
    private int $manufacturer_id;
    private string $image;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;
    private int $sort_order;

    public function __construct(
        int $manufacturer_id,
        string $image,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified,
        int $sort_order
    ) {
        $this->manufacturer_id = $manufacturer_id;
        $this->image = $image;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
        $this->sort_order = $sort_order;
    }

    public function getManufacturerId(): int {
        return $this->manufacturer_id;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
