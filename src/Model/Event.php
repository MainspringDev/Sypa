<?php

declare(strict_types=1);

namespace Sypa\Model;

class Event {
    private int $event_id;
    private string $code;
    private string $trigger;
    private string $action;
    private bool $status;
    private int $sort_order;

    public function __construct(
        int $event_id,
        string $code,
        string $trigger,
        string $action,
        bool $status,
        int $sort_order
    ) {
        $this->event_id = $event_id;
        $this->code = $code;
        $this->trigger = $trigger;
        $this->action = $action;
        $this->status = $status;
        $this->sort_order = $sort_order;
    }

    public function getEventId(): int {
        return $this->event_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getTrigger(): string {
        return $this->trigger;
    }

    public function getAction(): string {
        return $this->action;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
