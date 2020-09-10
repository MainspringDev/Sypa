<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderStatusCollection {
    /**
     * @var array<int, OrderStatus>
     */
    private array $orderStatuses = [];

    public function addOrderStatus(OrderStatus $orderStatus): void {
        $this->orderStatuses[] = $orderStatus;
    }

    public function current(): ?OrderStatus {
        $current = current($this->orderStatuses);

        return ($current instanceof OrderStatus ? $current : null);
    }

    public function next(): void {
        next($this->orderStatuses);
    }

    public function key(): ?int {
        return key($this->orderStatuses);
    }

    public function valid(): bool {
        return (key($this->orderStatuses) !== null);
    }

    public function rewind(): void {
        reset($this->orderStatuses);
    }

    public function count(): int {
        return count($this->orderStatuses);
    }
}
