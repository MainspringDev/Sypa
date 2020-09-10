<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Catalog;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Catalog\Review;

class ReviewHydrator {
    const REQUIRED_DATA = [
        'review_id',
        'product_id',
        'customer_id',
        'author',
        'text',
        'rating',
        'status',
        'date_added',
        'date_modified'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Review
     * @throws \Exception
     */
    public function hydrate(array $data): Review {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create review from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'review_id'     => $review_id,
            'product_id'    => $product_id,
            'customer_id'   => $customer_id,
            'author'        => $author,
            'text'          => $text,
            'rating'        => $rating,
            'status'        => $status,
            'date_added'    => $date_added,
            'date_modified' => $date_modified
        ) = $data;

        return new Review(
            $review_id,
            $product_id,
            $customer_id,
            $author,
            $text,
            $rating,
            $status,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added),
            $this->dateTimeFactory->makeDateTimeImmutable($date_modified)
        );
    }

    /**
     * @param Review $review
     * @return array<string, mixed>
     */
    public function extract(Review $review): array {
        return [
            'review_id'     => $review->getReviewId(),
            'product_id'    => $review->getProductId(),
            'customer_id'   => $review->getCustomerId(),
            'author'        => $review->getAuthor(),
            'text'          => $review->getText(),
            'rating'        => $review->getRating(),
            'status'        => $review->isStatus(),
            'date_added'    => $review->getDateAdded(),
            'date_modified' => $review->getDateModified()
        ];
    }
}
