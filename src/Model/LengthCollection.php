<?php

declare(strict_types=1);

namespace Sypa\Model;

class LengthCollection implements \Iterator, \Countable {
    /**
     * @var Length[]
     */
    private array $lengths = [];

    public function addLength(Length $length): void {
        $this->lengths[$length->getLengthId()] = $length;
    }

    public function hasLength(int $id): bool {
        return array_key_exists($id, $this->lengths);
    }

    public function getLength(int $id): Length {
        if ($this->hasLength($id) === false) {
            // @todo exception
            throw new \Exception();
        }

        return $this->lengths[$id];
    }

    public function current(): ?Length {
        $current = current($this->lengths);

        return ($current instanceof Length ? $current : null);
    }

    public function next(): void {
        next($this->lengths);
    }

    public function key(): ?int {
        return key($this->lengths);
    }

    public function valid(): bool {
        return (key($this->lengths) !== null);
    }

    public function rewind(): void {
        reset($this->lengths);
    }

    public function count(): int {
        return count($this->lengths);
    }
}
