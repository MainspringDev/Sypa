<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class AttributeGroupDescription {
    private int $attribute_group_id;
    private int $language_id;
    private string $name;

    public function __construct(int $attribute_group_id, int $language_id, string $name) {
        $this->attribute_group_id = $attribute_group_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getAttributeGroupId(): int {
        return $this->attribute_group_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
