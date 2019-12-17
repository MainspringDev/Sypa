<?php

declare(strict_types=1);

namespace Sypa\Model;

class CategoryCollection implements \Iterator, \Countable {
    /**
     * @var Category[]
     */
    private $categories = [];

    public function addCategory(Category $category): void {
        $this->categories[] = $category;
    }

    public function current(): ?Category {
        $current = current($this->categories);

        return ($current instanceof Category ? $current : null);
    }

    public function next(): void {
        next($this->categories);
    }

    public function key(): ?int {
        return key($this->categories);
    }

    public function valid(): bool {
        return (key($this->categories) !== null);
    }

    public function rewind(): void {
        reset($this->categories);
    }

    public function count(): int {
        return count($this->categories);
    }
}
