<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Catalog;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Catalog\Manufacturer;

class ManufacturerHydrator {
    const REQUIRED_DATA = [
        'manufacturer_id',
        'image',
        'date_added',
        'date_modified',
        'sort_order'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Manufacturer
     * @throws \Exception
     */
    public function hydrate(array $data): Manufacturer {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create manufacturer from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'manufacturer_id' => $manufacturer_id,
            'image'           => $image,
            'date_added'      => $date_added,
            'date_modified'   => $date_modified,
            'sort_order'      => $sort_order
        ) = $data;

        return new Manufacturer(
            $manufacturer_id,
            $image,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added),
            $this->dateTimeFactory->makeDateTimeImmutable($date_modified),
            $sort_order
        );
    }

    /**
     * @param Manufacturer $manufacturer
     * @return array<string, mixed>
     */
    public function extract(Manufacturer $manufacturer): array {
        return [
            'manufacturer_id' => $manufacturer->getmanufacturerId(),
            'image'           => $manufacturer->getImage(),
            'date_added'      => $manufacturer->getDateAdded(),
            'date_modified'   => $manufacturer->getDateModified(),
            'sort_order'      => $manufacturer->getSortOrder()
        ];
    }
}
