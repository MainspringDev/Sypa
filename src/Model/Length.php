<?php

declare(strict_types=1);

namespace Sypa\Model;

class Length {
    /**
     * @var float
     */
    private float $value;
    /**
     * @var string
     */
    private string $unit;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var int
     */
    private int $length_id;

    /**
     * @param int $length_id
     * @param float $value
     * @param string $unit
     * @param string $title
     */
    public function __construct(int $length_id, float $value, string $unit, string $title) {
        $this->value = $value;
        $this->unit = $unit;
        $this->title = $title;
        $this->length_id = $length_id;
    }

    /**
     * @return float
     */
    public function getValue(): float {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getUnit(): string {
        return $this->unit;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getLengthId(): int {
        return $this->length_id;
    }
}
