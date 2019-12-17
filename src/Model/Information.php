<?php

declare(strict_types=1);

namespace Sypa\Model;

class Information {
    /**
     * @var int
     */
    private $information_id;
    /**
     * @var int
     */
    private $bottom;
    /**
     * @var int
     */
    private $sort_order;
    /**
     * @var bool
     */
    private $status;
    /**
     * @var \DateTimeInterface
     */
    private $date_added;
    /**
     * @var \DateTimeInterface
     */
    private $date_modified;
    /**
     * @var bool
     */
    private $display;

    /**
     * @param int $information_id
     * @param int $bottom
     * @param int $sort_order
     * @param bool $status
     * @param \DateTimeInterface $date_added
     * @param \DateTimeInterface $date_modified
     * @param bool $display
     */
    public function __construct(
        int $information_id,
        int $bottom,
        int $sort_order,
        bool $status,
        \DateTimeInterface $date_added,
        \DateTimeInterface $date_modified,
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
     * @return \DateTimeInterface
     */
    public function getDateAdded(): \DateTimeInterface {
        return $this->date_added;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateModified(): \DateTimeInterface {
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
