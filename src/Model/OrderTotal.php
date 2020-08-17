<?php

declare(strict_types=1);

namespace Sypa\Model;

class OrderTotal {
    private int $order_total_id;
    private int $order_id;
    private string $code;
    private string $title;
    private float $value;
    private int $sort_order;

    public function __construct(
        int $order_total_id,
        int $order_id,
        string $code,
        string $title,
        float $value,
        int $sort_order
    ) {
        $this->order_total_id = $order_total_id;
        $this->order_id = $order_id;
        $this->code = $code;
        $this->title = $title;
        $this->value = $value;
        $this->sort_order = $sort_order;
    }

    public function getOrderTotalId(): int {
        return $this->order_total_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getValue(): float {
        return $this->value;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
