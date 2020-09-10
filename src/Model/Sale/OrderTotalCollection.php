<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderTotalCollection {
    /**
     * @var array<int, OrderTotal>
     */
    private array $orderTotals = [];

    public function addOrderTotal(OrderTotal $orderTotal): void {
        $this->orderTotals[] = $orderTotal;
    }

    public function current(): ?OrderTotal {
        $current = current($this->orderTotals);

        return ($current instanceof OrderTotal ? $current : null);
    }

    public function next(): void {
        next($this->orderTotals);
    }

    public function key(): ?int {
        return key($this->orderTotals);
    }

    public function valid(): bool {
        return (key($this->orderTotals) !== null);
    }

    public function rewind(): void {
        reset($this->orderTotals);
    }

    public function count(): int {
        return count($this->orderTotals);
    }
}
