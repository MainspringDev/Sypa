<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class Category {
    private int $category_id;
    private string $image;
    private int $parent_id;
    private bool $top;
    private int $column;
    private int $sort_order;
    private bool $status;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $category_id,
        string $image,
        int $parent_id,
        bool $top,
        int $column,
        int $sort_order,
        bool $status,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->category_id = $category_id;
        $this->image = $image;
        $this->parent_id = $parent_id;
        $this->top = $top;
        $this->column = $column;
        $this->sort_order = $sort_order;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getParentId(): int {
        return $this->parent_id;
    }

    public function isTop(): bool {
        return $this->top;
    }

    public function getColumn(): int {
        return $this->column;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
