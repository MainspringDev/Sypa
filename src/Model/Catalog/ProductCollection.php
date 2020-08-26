<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductCollection implements \Iterator, \Countable {
    /**
     * @var Product[]
     */
    private array $products = [];

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function current(): ?Product {
        $current = current($this->products);

        return ($current instanceof Product ? $current : null);
    }

    public function next(): void {
        next($this->products);
    }

    public function key(): ?int {
        return key($this->products);
    }

    public function valid(): bool {
        return (key($this->products) !== null);
    }

    public function rewind(): void {
        reset($this->products);
    }

    public function count(): int {
        return count($this->products);
    }
}
