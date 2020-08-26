<?php

declare(strict_types=1);

namespace Sypa\Model\Setting;

class Cron {
    private int $cron_id;
    private string $code;
    private string $cycle;
    private string $action;
    private bool $status;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $cron_id,
        string $code,
        string $cycle,
        string $action,
        bool $status,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->cron_id = $cron_id;
        $this->code = $code;
        $this->cycle = $cycle;
        $this->action = $action;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getCronId(): int {
        return $this->cron_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getCycle(): string {
        return $this->cycle;
    }

    public function getAction(): string {
        return $this->action;
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
