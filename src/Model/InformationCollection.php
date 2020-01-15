<?php

declare(strict_types=1);

namespace Sypa\Model;

class InformationCollection implements \Iterator, \Countable {
    /**
     * @var Information[]
     */
    private array $informations = [];

    public function addInformation(Information $information): void {
        $this->informations[] = $information;
    }

    public function current(): ?Information {
        $current = current($this->informations);

        return ($current instanceof Information ? $current : null);
    }

    public function next(): void {
        next($this->informations);
    }

    public function key(): ?int {
        return key($this->informations);
    }

    public function valid(): bool {
        return (key($this->informations) !== null);
    }

    public function rewind(): void {
        reset($this->informations);
    }

    public function count(): int {
        return count($this->informations);
    }
}
