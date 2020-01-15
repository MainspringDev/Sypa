<?php

declare(strict_types=1);

namespace Sypa\Model;

class Category {
    /**
     * @var int
     */
    private int $category_id;
    /**
     * @var string
     */
    private string $image;
    /**
     * @var int
     */
    private int $parent_id;
    /**
     * @var bool
     */
    private bool $top;
    /**
     * @var int
     */
    private int $column;
    /**
     * @var int
     */
    private int $sort_order;
    /**
     * @var bool
     */
    private bool $status;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_added;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_modified;

    /**
     * @param int $category_id
     * @param string $image
     * @param int $parent_id
     * @param bool $top
     * @param int $column
     * @param int $sort_order
     * @param bool $status
     * @param \DateTimeImmutable $date_added
     * @param \DateTimeImmutable $date_modified
     */
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

    /**
     * @return int
     */
    public function getCategoryId(): int {
        return $this->category_id;
    }

    /**
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * @return int
     */
    public function getParentId(): int {
        return $this->parent_id;
    }

    /**
     * @return bool
     */
    public function isTop(): bool {
        return $this->top;
    }

    /**
     * @return int
     */
    public function getColumn(): int {
        return $this->column;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int {
        return $this->sort_order;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
