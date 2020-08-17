<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomerGroup {
    private int $customer_group_id;
    private int $approval;
    private int $sort_order;

    public function __construct(int $customer_group_id, int $approval, int $sort_order) {
        $this->customer_group_id = $customer_group_id;
        $this->approval = $approval;
        $this->sort_order = $sort_order;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function getApproval(): int {
        return $this->approval;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
