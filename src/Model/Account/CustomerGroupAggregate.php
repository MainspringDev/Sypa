<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class CustomerGroupAggregate {
    private CustomerGroup $customerGroup;
    private CustomerGroupDescription $customerGroupDescription;

    public function __construct(CustomerGroup $customerGroup, CustomerGroupDescription $customerGroupDescription) {
        $this->customerGroup = $customerGroup;
        $this->customerGroupDescription = $customerGroupDescription;
    }

    public function getCustomerGroup(): CustomerGroup {
        return $this->customerGroup;
    }

    public function getCustomerGroupDescription(): CustomerGroupDescription {
        return $this->customerGroupDescription;
    }
}
