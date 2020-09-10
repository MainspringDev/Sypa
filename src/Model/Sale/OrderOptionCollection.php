<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderOptionCollection {
    /**
     * @var array<int, OrderOption>
     */
    private array $orderOptions = [];

    public function addOrderOption(OrderOption $orderOption): void {
        $this->orderOptions[] = $orderOption;
    }

    public function current(): ?OrderOption {
        $current = current($this->orderOptions);

        return ($current instanceof OrderOption ? $current : null);
    }

    public function next(): void {
        next($this->orderOptions);
    }

    public function key(): ?int {
        return key($this->orderOptions);
    }

    public function valid(): bool {
        return (key($this->orderOptions) !== null);
    }

    public function rewind(): void {
        reset($this->orderOptions);
    }

    public function count(): int {
        return count($this->orderOptions);
    }
}
