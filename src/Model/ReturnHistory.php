<?php

declare(strict_types=1);

namespace Sypa\Model;

class ReturnHistory {
    private int $return_history_id;
    private int $return_id;
    private int $return_status_id;
    private bool $notify;
    private string $comment;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $return_history_id,
        int $return_id,
        int $return_status_id,
        bool $notify,
        string $comment,
        \DateTimeImmutable $date_added
    ) {
        $this->return_history_id = $return_history_id;
        $this->return_id = $return_id;
        $this->return_status_id = $return_status_id;
        $this->notify = $notify;
        $this->comment = $comment;
        $this->date_added = $date_added;
    }

    public function getReturnHistoryId(): int {
        return $this->return_history_id;
    }

    public function getReturnId(): int {
        return $this->return_id;
    }

    public function getReturnStatusId(): int {
        return $this->return_status_id;
    }

    public function isNotify(): bool {
        return $this->notify;
    }

    public function getComment(): string {
        return $this->comment;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
