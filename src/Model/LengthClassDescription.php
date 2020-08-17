<?php

declare(strict_types=1);

namespace Sypa\Model;

class LengthClassDescription {
    private int $length_class_id;
    private int $language_id;
    private string $title;
    private string $unit;

    public function __construct(int $length_class_id, int $language_id, string $title, string $unit) {
        $this->length_class_id = $length_class_id;
        $this->language_id = $language_id;
        $this->title = $title;
        $this->unit = $unit;
    }

    public function getLengthClassId(): int {
        return $this->length_class_id;
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
