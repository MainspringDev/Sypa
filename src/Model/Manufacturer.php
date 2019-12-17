<?php

declare(strict_types=1);

namespace Sypa\Model;

class Manufacturer {
    /**
     * @var int
     */
    private $manufacturer_id;
    /**
     * @var string
     */
    private $image;
    /**
     * @var \DateTimeInterface
     */
    private $date_added;
    /**
     * @var \DateTimeInterface
     */
    private $date_modified;
    /**
     * @var int
     */
    private $sort_order;

    /**
     * @param int $manufacturer_id
     * @param string $image
     * @param \DateTimeInterface $date_added
     * @param \DateTimeInterface $date_modified
     * @param int $sort_order
     */
    public function __construct(
        int $manufacturer_id,
        string $image,
        \DateTimeInterface $date_added,
        \DateTimeInterface $date_modified,
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
     * @return \DateTimeInterface
     */
    public function getDateAdded(): \DateTimeInterface {
        return $this->date_added;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateModified(): \DateTimeInterface {
        return $this->date_modified;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
