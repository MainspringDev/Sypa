<?php

declare(strict_types=1);

namespace Sypa\Model\Information;

class InformationCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Information>
     */
    private array $information = [];

    public function addInformation(Information $information): void {
        $this->information[] = $information;
    }

    public function current(): ?Information {
        $current = current($this->information);

        return ($current instanceof Information ? $current : null);
    }

    public function next(): void {
        next($this->information);
    }

    public function key(): ?int {
        return key($this->information);
    }

    public function valid(): bool {
        return (key($this->information) !== null);
    }

    public function rewind(): void {
        reset($this->information);
    }

    public function count(): int {
        return count($this->information);
    }
}
