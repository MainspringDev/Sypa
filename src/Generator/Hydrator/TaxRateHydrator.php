<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\TaxRate;

class TaxRateHydrator {
    const REQUIRED_DATA = [
        'tax_rate_id',
        'geo_zone_id',
        'name',
        'rate',
        'type',
        'date_added',
        'date_modified'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    public function hydrate(array $data): TaxRate {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create category description from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'tax_rate_id'   => $tax_rate_id,
            'geo_zone_id'   => $geo_zone_id,
            'name'          => $name,
            'rate'          => $rate,
            'type'          => $type,
            'date_added'    => $date_added,
            'date_modified' => $date_modified
        ) = $data;

        return new TaxRate(
            $tax_rate_id,
            $name,
            $rate,
            $type,
            $priority
        );
    }

    public function extract(TaxRate $taxRate): array {
        return [
            'tax_rate_id',
            'geo_zone_id',
            'name',
            'rate',
            'type',
            'date_added',
            'date_modified'
        ];
    }
}
