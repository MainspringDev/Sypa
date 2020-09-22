<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Account;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Account\CustomerWishList;

class CustomerWishListHydrator {
    const REQUIRED_DATA = [
        'customer_id',
        'product_id',
        'date_added'
    ];
    private DateTimeFactory $dateTimeFactory;

    /**
     * @param DateTimeFactory $dateTimeFactory
     */
    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return CustomerWishList
     * @throws \Exception
     */
    public function hydrate(array $data): CustomerWishList {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create CustomerWishList from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'customer_id' => $customer_id,
            'product_id'  => $product_id,
            'date_added'  => $date_added
        ) = $data;

        return new CustomerWishList(
            $customer_id,
            $product_id,
            $this->dateTimeFactory->makeDateTimeImmutable($date_added)
        );
    }

    /**
     * @param CustomerWishList $customerWishlist
     * @return array<string, mixed>
     */
    public function extract(CustomerWishList $customerWishlist): array {
        return [
            'customer_id' => $customerWishlist->getCustomerId(),
            'product_id'  => $customerWishlist->getProductId(),
            'date_added'  => $customerWishlist->getDateAdded()
        ];
    }
}
