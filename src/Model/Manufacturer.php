<?php

declare(strict_types=1);

namespace Sypa\Model;

class Manufacturer {
    /**
     * @var int
     */
    private int $manufacturer_id;
    /**
     * @var string
     */
    private string $image;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_added;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_modified;
    /**
     * @var int
     */
    private int $sort_order;

    /**
     * @param int $manufacturer_id
     * @param string $image
     * @param \DateTimeImmutable $date_added
     * @param \DateTimeImmutable $date_modified
     * @param int $sort_order
     */
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

    /**
     * @return int
     */
    public function getManufacturerId(): int {
        return $this->manufacturer_id;
    }

    /**
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
