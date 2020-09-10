<?php

declare(strict_types=1);

namespace Sypa\Model\Report;

class StatisticsCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Statistics>
     */
    private array $statistics = [];

    public function addStatistics(Statistics $statistics): void {
        $this->statistics[] = $statistics;
    }

    public function current(): ?Statistics {
        $current = current($this->statistics);

        return ($current instanceof Statistics ? $current : null);
    }

    public function next(): void {
        next($this->statistics);
    }

    public function key(): ?int {
        return key($this->statistics);
    }

    public function valid(): bool {
        return (key($this->statistics) !== null);
    }

    public function rewind(): void {
        reset($this->statistics);
    }

    public function count(): int {
        return count($this->statistics);
    }
}
