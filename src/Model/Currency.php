<?php

declare(strict_types=1);

namespace Sypa\Model;

use Sypa\Exception\InvalidResourceIdentifierException;

class Currency {
    /**
     * @var int
     */
    private int $currency_id;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string
     */
    private string $code;
    /**
     * @var string
     */
    private string $symbol_left;
    /**
     * @var string
     */
    private string $symbol_right;
    /**
     * @var int
     */
    private int $decimal_place;
    /**
     * @var float
     */
    private float $value;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_modified;
    /**
     * @var bool
     */
    private bool $status;

    /**
     * @param int $currency_id
     * @param string $code
     * @param string $title
     * @param string $symbol_left
     * @param string $symbol_right
     * @param int $decimal_place
     * @param float $value
     * @param \DateTimeImmutable $date_modified
     * @param bool $status
     */
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

    /**
     * @return int
     */
    public function getCurrencyId(): int {
        return $this->currency_id;
    }

    /**
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSymbolLeft(): string {
        return $this->symbol_left;
    }

    /**
     * @return string
     */
    public function getSymbolRight(): string {
        return $this->symbol_right;
    }

    /**
     * @return int
     */
    public function getDecimalPlace(): int {
        return $this->decimal_place;
    }

    /**
     * @return float
     */
    public function getValue(): float {
        return $this->value;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }
}
