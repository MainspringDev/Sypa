<?php

namespace Sypa\Model\Catalog;

class ProductDiscountCollection implements \Iterator, \Countable {
    /**
     * @var array<int, ProductDiscount>
     */
    private array $product_discounts = [];

    public function addProductDiscount(productDiscount $productDiscount): void {
        $this->product_discounts[] = $productDiscount;
    }

    public function current(): ?ProductDiscount {
        $current = current($this->product_discounts);

        return ($current instanceof productDiscount ? $current : null);
    }

    public function next(): void {
        next($this->product_discounts);
    }

    public function key(): ?int {
        return key($this->product_discounts);
    }

    public function valid(): bool {
        return (key($this->product_discounts) !== null);
    }

    public function rewind(): void {
        reset($this->product_discounts);
    }

    public function count(): int {
        return count($this->product_discounts);
    }
}
