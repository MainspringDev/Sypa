<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class TaxRateToCustomerGroup {
    private int $tax_rate_id;
    private int $customer_group_id;

    public function __construct(int $tax_rate_id, int $customer_group_id) {
        $this->tax_rate_id = $tax_rate_id;
        $this->customer_group_id = $customer_group_id;
    }

    public function getTaxRateId(): int {
        return $this->tax_rate_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }
}
