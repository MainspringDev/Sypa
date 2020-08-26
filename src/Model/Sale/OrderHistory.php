<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderHistory {
    private int $order_history_id;
    private int $order_id;
    private int $order_status_id;
    private bool $notify;
    private string $comment;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $order_history_id,
        int $order_id,
        int $order_status_id,
        bool $notify,
        string $comment,
        \DateTimeImmutable $date_added
    ) {
        $this->order_history_id = $order_history_id;
        $this->order_id = $order_id;
        $this->order_status_id = $order_status_id;
        $this->notify = $notify;
        $this->comment = $comment;
        $this->date_added = $date_added;
    }

    public function getOrderHistoryId(): int {
        return $this->order_history_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getOrderStatusId(): int {
        return $this->order_status_id;
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
