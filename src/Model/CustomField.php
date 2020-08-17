<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomField {
    private int $custom_field_id;
    private string $type;
    private string $value;
    private string $validation;
    private string $location;
    private bool $status;
    private int $sort_order;

    public function __construct(
        int $custom_field_id,
        string $type,
        string $value,
        string $validation,
        string $location,
        bool $status,
        int $sort_order
    ) {
        $this->custom_field_id = $custom_field_id;
        $this->type = $type;
        $this->value = $value;
        $this->validation = $validation;
        $this->location = $location;
        $this->status = $status;
        $this->sort_order = $sort_order;
    }

    public function getCustomFieldId(): int {
        return $this->custom_field_id;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function getValidation(): string {
        return $this->validation;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
