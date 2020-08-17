<?php

declare(strict_types=1);

namespace Sypa\Model;

class CategoryFilter {
    private int $category_id;
    private int $filter_id;

    public function __construct(int $category_id, int $filter_id) {
        $this->category_id = $category_id;
        $this->filter_id = $filter_id;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    public function getFilterId(): int {
        return $this->filter_id;
    }
}
