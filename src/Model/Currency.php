<?php

declare(strict_types=1);

namespace Sypa\Model;

use Sypa\Exception\InvalidResourceIdentifierException;

class Currency {
    private int $currency_id;
    private string $title;
    private string $code;
    private string $symbol_left;
    private string $symbol_right;
    private int $decimal_place;
    private float $value;
    private \DateTimeImmutable $date_modified;
    private bool $status;

    public function __construct(
        int $currency_id,
        string $code,
        string $title,
        string $symbol_left,
        string $symbol_right,
        int $decimal_place,
        float $value,
        \DateTimeImmutable $date_modified,
        bool $status
    ) {
        if ($currency_id < 1) {
            throw new InvalidResourceIdentifierException();
        }

        $this->currency_id = $currency_id;
        $this->code = $code;
        $this->title = $title;
        $this->symbol_left = $symbol_left;
        $this->symbol_right = $symbol_right;
        $this->decimal_place = $decimal_place;
        $this->value = $value;
        $this->date_modified = $date_modified;
        $this->status = $status;
    }

    public function getCurrencyId(): int {
        return $this->currency_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getSymbolLeft(): string {
        return $this->symbol_left;
    }

    public function getSymbolRight(): string {
        return $this->symbol_right;
    }

    public function getDecimalPlace(): int {
        return $this->decimal_place;
    }

    public function getValue(): float {
        return $this->value;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    public function isStatus(): bool {
        return $this->status;
    }
}
