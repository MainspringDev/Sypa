<?php

declare(strict_types=1);

namespace Sypa\Model;

class Information {
    /**
     * @var int
     */
    private int $information_id;
    /**
     * @var int
     */
    private int $bottom;
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
     * @var bool
     */
    private bool $display;

    /**
     * @param int $information_id
     * @param int $bottom
     * @param int $sort_order
     * @param bool $status
     * @param \DateTimeImmutable $date_added
     * @param \DateTimeImmutable $date_modified
     * @param bool $display
     */
    public function __construct(
        int $information_id,
        int $bottom,
        int $sort_order,
        bool $status,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified,
        bool $display
    ) {
        $this->information_id = $information_id;
        $this->bottom = $bottom;
        $this->sort_order = $sort_order;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
        $this->display = $display;
    }

    /**
     * @return int
     */
    public function getInformationId(): int {
        return $this->information_id;
    }

    /**
     * @return int
     */
    public function getBottom(): int {
        return $this->bottom;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int {
        return $this->sort_order;
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

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isDisplay(): bool {
        return $this->display;
    }
}
