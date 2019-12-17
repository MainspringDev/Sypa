<?php

declare(strict_types=1);

namespace Sypa\Model;

use Sypa\Exception\InvalidResourceIdentifierException;

class Currency {
    /**
     * @var int
     */
    private $currency_id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $symbol_left;
    /**
     * @var string
     */
    private $symbol_right;
    /**
     * @var int
     */
    private $decimal_place;
    /**
     * @var float
     */
    private $value;
    /**
     * @var bool
     */
    private $status;
    /**
     * @var \DateTimeInterface
     */
    private $date_modified;

    /**
     * @param int $currency_id
     * @param string $code
     * @param string $title
     * @param string $symbol_left
     * @param string $symbol_right
     * @param int $decimal_place
     * @param float $value
     * @param \DateTimeInterface $date_modified
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
        \DateTimeInterface $date_modified,
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
     * @return \DateTimeInterface
     */
    public function getDateModified(): \DateTimeInterface {
        return $this->date_modified;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }
}
