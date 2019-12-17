<?php

declare(strict_types=1);

namespace Sypa\Model;

class ManufacturerCollection implements \Iterator, \Countable {
    /**
     * @var Manufacturer[]
     */
    private $manufacturers = [];

    public function addManufacturer(Manufacturer $manufacturer): void {
        $this->manufacturers[] = $manufacturer;
    }

    public function current(): ?Manufacturer {
        $current = current($this->manufacturers);

        return ($current instanceof Manufacturer ? $current : null);
    }

    public function next(): void {
        next($this->manufacturers);
    }

    public function key(): ?int {
        return key($this->manufacturers);
    }

    public function valid(): bool {
        return (key($this->manufacturers) !== null);
    }

    public function rewind(): void {
        reset($this->manufacturers);
    }

    public function count(): int {
        return count($this->manufacturers);
    }
}
