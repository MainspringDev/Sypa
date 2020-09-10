<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderProductCollection {
    /**
     * @var array<int, OrderProduct>
     */
    private array $orderProducts = [];

    public function addOrderProduct(OrderProduct $orderProduct): void {
        $this->orderProducts[] = $orderProduct;
    }

    public function current(): ?OrderProduct {
        $current = current($this->orderProducts);

        return ($current instanceof OrderProduct ? $current : null);
    }

    public function next(): void {
        next($this->orderProducts);
    }

    public function key(): ?int {
        return key($this->orderProducts);
    }

    public function valid(): bool {
        return (key($this->orderProducts) !== null);
    }

    public function rewind(): void {
        reset($this->orderProducts);
    }

    public function count(): int {
        return count($this->orderProducts);
    }
}
