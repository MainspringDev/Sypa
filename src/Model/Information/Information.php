<?php

declare(strict_types=1);

namespace Sypa\Model\Information;

class Information {
    private int $information_id;
    private int $bottom;
    private int $sort_order;
    private bool $status;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;
    private bool $display;

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

    public function getInformationId(): int {
        return $this->information_id;
    }

    public function getBottom(): int {
        return $this->bottom;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function isDisplay(): bool {
        return $this->display;
    }
}
