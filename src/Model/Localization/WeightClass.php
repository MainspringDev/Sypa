<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class WeightClass {
    private int $weight_class_id;
    private float $value;

    public function __construct(int $weight_class_id, float $value) {
        $this->weight_class_id = $weight_class_id;
        $this->value = $value;
    }

    public function getWeightClassId(): int {
        return $this->weight_class_id;
    }

    public function getValue(): float {
        return $this->value;
    }
}
