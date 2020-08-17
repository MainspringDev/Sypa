<?php

declare(strict_types=1);

namespace Sypa\Model;

// @todo extend address?

class CustomerAddress {
    private int $customer_id;
    private int $address_id;
    private bool $default;

    public function __construct(int $customer_id, int $address_id, bool $default) {
        $this->customer_id = $customer_id;
        $this->address_id = $address_id;
        $this->default = $default;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getAddressId(): int {
        return $this->address_id;
    }

    public function isDefault(): bool {
        return $this->default;
    }
}
