<?php

declare(strict_types=1);

namespace Sypa\Model;

class Review {
    private int $review_id;
    private int $product_id;
    private int $customer_id;
    private string $author;
    private string $text;
    private int $rating;
    private bool $status;
    private \DateTimeImmutable $dateAdded;
    private \DateTimeImmutable $dateModified;

    public function __construct(
        int $review_id,
        int $product_id,
        int $customer_id,
        string $author,
        string $text,
        int $rating,
        bool $status,
        \DateTimeImmutable $dateAdded,
        \DateTimeImmutable $dateModified
    ) {
        $this->review_id = $review_id;
        $this->product_id = $product_id;
        $this->customer_id = $customer_id;
        $this->author = $author;
        $this->text = $text;
        $this->rating = $rating;
        $this->status = $status;
        $this->dateAdded = $dateAdded;
        $this->dateModified = $dateModified;
    }

    public function getReviewId(): int {
        return $this->review_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getRating(): int {
        return $this->rating;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->dateAdded;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->dateModified;
    }
}
