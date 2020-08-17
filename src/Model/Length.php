<?php

declare(strict_types=1);

namespace Sypa\Model;

class Length {
    private float $value;
    private string $unit;
    private string $title;
    private int $length_id;

    public function __construct(int $length_id, float $value, string $unit, string $title) {
        $this->value = $value;
        $this->unit = $unit;
        $this->title = $title;
        $this->length_id = $length_id;
    }

    public function getValue(): float {
        return $this->value;
    }

    public function getUnit(): string {
        return $this->unit;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getLengthId(): int {
        return $this->length_id;
    }
}
