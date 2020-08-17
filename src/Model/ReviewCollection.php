<?php

declare(strict_types=1);

namespace Sypa\Model;

class ReviewCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Review>
     */
    private array $reviews = [];

    public function addReview(Review $review): void {
        $this->reviews[] = $review;
    }

    public function current(): ?Review {
        $current = current($this->reviews);

        return ($current instanceof Review ? $current : null);
    }

    public function next(): void {
        next($this->reviews);
    }

    public function key(): ?int {
        return key($this->reviews);
    }

    public function valid(): bool {
        return (key($this->reviews) !== null);
    }

    public function rewind(): void {
        reset($this->reviews);
    }

    public function count(): int {
        return count($this->reviews);
    }
}
