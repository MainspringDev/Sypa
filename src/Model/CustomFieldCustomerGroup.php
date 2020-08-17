<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomFieldCustomerGroup {
    private int $custom_field_id;
    private int $customer_group_id;
    private bool $required;

    public function __construct(int $custom_field_id, int $customer_group_id, bool $required) {
        $this->custom_field_id = $custom_field_id;
        $this->customer_group_id = $customer_group_id;
        $this->required = $required;
    }

    public function getCustomFieldId(): int {
        return $this->custom_field_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function isRequired(): bool {
        return $this->required;
    }
}
