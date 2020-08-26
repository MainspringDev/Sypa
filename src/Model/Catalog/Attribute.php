<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class Attribute {
    private int $attribute_id;
    private int $attribute_group_id;
    private int $sort_order;

    public function __construct(int $attribute_id, int $attribute_group_id, int $sort_order) {
        $this->attribute_id = $attribute_id;
        $this->attribute_group_id = $attribute_group_id;
        $this->sort_order = $sort_order;
    }

    public function getAttributeId(): int {
        return $this->attribute_id;
    }

    public function getAttributeGroupId(): int {
        return $this->attribute_group_id;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
