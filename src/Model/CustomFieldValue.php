<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomFieldValue {
    private int $custom_field_value_id;
    private int $custom_field_id;
    private int $sort_order;

    public function __construct(int $custom_field_value_id, int $custom_field_id, int $sort_order) {
        $this->custom_field_value_id = $custom_field_value_id;
        $this->custom_field_id = $custom_field_id;
        $this->sort_order = $sort_order;
    }

    public function getCustomFieldValueId(): int {
        return $this->custom_field_value_id;
    }

    public function getCustomFieldId(): int {
        return $this->custom_field_id;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
