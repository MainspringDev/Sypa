<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class LengthClass {
    private int $length_class_id;
    private float $value;

    public function __construct(int $length_class_id, float $value) {
        $this->length_class_id = $length_class_id;
        $this->value = $value;
    }

    public function getLengthClassId(): int {
        return $this->length_class_id;
    }

    public function getValue(): float {
        return $this->value;
    }
}
