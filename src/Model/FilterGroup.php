<?php

declare(strict_types=1);

namespace Sypa\Model;

class FilterGroup {
    private int $filter_group_id;
    private int $sort_order;

    public function __construct(int $filter_group_id, int $sort_order) {
        $this->filter_group_id = $filter_group_id;
        $this->sort_order = $sort_order;
    }

    public function getFilterGroupId(): int {
        return $this->filter_group_id;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
