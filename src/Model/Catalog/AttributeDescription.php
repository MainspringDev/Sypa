<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class AttributeDescription {
    private int $attribute_id;
    private int $language_id;
    private string $name;

    public function __construct(int $attribute_id, int $language_id, string $name) {
        $this->attribute_id = $attribute_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getAttributeId(): int {
        return $this->attribute_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
