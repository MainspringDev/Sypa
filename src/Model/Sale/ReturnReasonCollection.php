<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class ReturnReasonCollection implements \Iterator, \Countable {
    /**
     * @var array<int, ReturnReason>
     */
    private array $returnReasons = [];

    public function addReturnReason(ReturnReason $returnReason): void {
        $this->returnReasons[] = $returnReason;
    }

    public function current(): ?ReturnReason {
        $current = current($this->returnReasons);

        return ($current instanceof ReturnReason ? $current : null);
    }

    public function next(): void {
        next($this->returnReasons);
    }

    public function key(): ?int {
        return key($this->returnReasons);
    }

    public function valid(): bool {
        return (key($this->returnReasons) !== null);
    }

    public function rewind(): void {
        reset($this->returnReasons);
    }

    public function count(): int {
        return count($this->returnReasons);
    }
}
