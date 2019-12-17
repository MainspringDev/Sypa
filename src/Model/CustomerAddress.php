<?php

declare(strict_types=1);

namespace Sypa\Model;

// @todo extend address?

class CustomerAddress {
    /**
     * @var int
     */
    private $customer_id;
    /**
     * @var int
     */
    private $address_id;
    /**
     * @var bool
     */
    private $default;

    /**
     * @param int $customer_id
     * @param int $address_id
     * @param bool $default
     */
    public function __construct(int $customer_id, int $address_id, bool $default) {
        $this->customer_id = $customer_id;
        $this->address_id = $address_id;
        $this->default = $default;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int {
        return $this->customer_id;
    }

    /**
     * @return int
     */
    public function getAddressId(): int {
        return $this->address_id;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool {
        return $this->default;
    }
}
