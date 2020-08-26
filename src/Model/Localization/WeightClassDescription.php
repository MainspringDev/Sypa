<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class WeightClassDescription {
    private int $weight_class_id;
    private int $language_id;
    private string $title;
    private string $unit;

    public function __construct(int $weight_class_id, int $language_id, string $title, string $unit) {
        $this->weight_class_id = $weight_class_id;
        $this->language_id = $language_id;
        $this->title = $title;
        $this->unit = $unit;
    }

    public function getWeightClassId(): int {
        return $this->weight_class_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getUnit(): string {
        return $this->unit;
    }
}
