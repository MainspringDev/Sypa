<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomerGroupDescription {
    private int $customer_group_id;
    private int $language_id;
    private string $name;
    private string $description;

    public function __construct(int $customer_group_id, int $language_id, string $name, string $description) {
        $this->customer_group_id = $customer_group_id;
        $this->language_id = $language_id;
        $this->name = $name;
        $this->description = $description;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }
}
