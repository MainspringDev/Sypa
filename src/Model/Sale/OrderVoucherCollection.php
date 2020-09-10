<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderVoucherCollection {
    /**
     * @var array<int, OrderVoucher>
     */
    private array $orderVouchers = [];

    public function addOrderVoucher(OrderVoucher $orderVoucher): void {
        $this->orderVouchers[] = $orderVoucher;
    }

    public function current(): ?OrderVoucher {
        $current = current($this->orderVouchers);

        return ($current instanceof OrderVoucher ? $current : null);
    }

    public function next(): void {
        next($this->orderVouchers);
    }

    public function key(): ?int {
        return key($this->orderVouchers);
    }

    public function valid(): bool {
        return (key($this->orderVouchers) !== null);
    }

    public function rewind(): void {
        reset($this->orderVouchers);
    }

    public function count(): int {
        return count($this->orderVouchers);
    }
}
