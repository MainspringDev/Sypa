<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderStatus {
    private int $order_status_id;
    private int $language_id;
    private string $name;

    public function __construct(int $order_status_id, int $language_id, string $name) {
        $this->order_status_id = $order_status_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getOrderStatusId(): int {
        return $this->order_status_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
