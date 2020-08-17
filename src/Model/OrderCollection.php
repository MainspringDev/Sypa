<?php

declare(strict_types=1);

namespace Sypa\Model;

class OrderCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Order>
     */
    private array $orders = [];

    public function addOrder(Order $order): void {
        $this->orders[] = $order;
    }

    public function current(): ?Order {
        $current = current($this->orders);

        return ($current instanceof Order ? $current : null);
    }

    public function next(): void {
        next($this->orders);
    }

    public function key(): ?int {
        return key($this->orders);
    }

    public function valid(): bool {
        return (key($this->orders) !== null);
    }

    public function rewind(): void {
        reset($this->orders);
    }

    public function count(): int {
        return count($this->orders);
    }
}
