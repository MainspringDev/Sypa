<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Localization\Currency;

class CurrencyHydrator {
    const REQUIRED_DATA = [
        'currency_id',
        'title',
        'code',
        'symbol_left',
        'symbol_right',
        'decimal_place',
        'value',
        'status',
        'date_modified'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    public function hydrate(array $data): Currency {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create currency from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'currency_id'   => $currency_id,
            'title'         => $title,
            'code'          => $code,
            'symbol_left'   => $symbol_left,
            'symbol_right'  => $symbol_right,
            'decimal_place' => $decimal_place,
            'value'         => $value,
            'status'        => $status,
            'date_modified' => $date_modified
        ) = $data;

        return new Currency(
            $currency_id,
            $code,
            $title,
            $symbol_left,
            $symbol_right,
            $decimal_place,
            $value,
            $this->dateTimeFactory->makeDateTimeImmutable($date_modified),
            $status
        );
    }

    /**
     * @param Currency $currency
     * @return array<string, mixed>
     */
    public function extract(Currency $currency): array {
        return [
            'currency_id'   => $currency->getCurrencyId(),
            'title'         => $currency->getTitle(),
            'code'          => $currency->getCode(),
            'symbol_left'   => $currency->getSymbolLeft(),
            'symbol_right'  => $currency->getSymbolRight(),
            'decimal_place' => $currency->getDecimalPlace(),
            'value'         => $currency->getValue(),
            'status'        => $currency->isStatus(),
            'date_modified' => $currency->getDateModified()
        ];
    }
}
