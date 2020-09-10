<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Catalog;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Catalog\ProductDiscount;

class ProductDiscountHydrator {
    const REQUIRED_DATA = [
        'product_discount_id',
        'product_id',
        'customer_group_id',
        'quantity',
        'priority',
        'price',
        'date_start',
        'date_end'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array<string, mixed> $data
     * @return ProductDiscount
     * @throws \Exception
     */
    public function hydrate(array $data): ProductDiscount {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create product discount from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'product_discount_id' => $product_discount_id,
            'product_id'          => $product_id,
            'customer_group_id'   => $customer_group_id,
            'quantity'            => $quantity,
            'priority'            => $priority,
            'price'               => $price,
            'date_start'          => $date_start,
            'date_end'            => $date_end
        ) = $data;

        return new ProductDiscount(
            $product_discount_id,
            $product_id,
            $customer_group_id,
            $quantity,
            $priority,
            $price,
            $this->dateTimeFactory->makeDateTimeImmutable($date_start),
            $this->dateTimeFactory->makeDateTimeImmutable($date_end)
        );
    }

    /**
     * @param ProductDiscount $productDiscount
     * @return array<string, mixed>
     */
    public function extract(ProductDiscount $productDiscount): array {
        return [
            'product_discount_id' => $productDiscount->getProductDiscountId(),
            'product_id'          => $productDiscount->getProductId(),
            'customer_group_id'   => $productDiscount->getCustomerGroupId(),
            'quantity'            => $productDiscount->getQuantity(),
            'priority'            => $productDiscount->getPriority(),
            'price'               => $productDiscount->getPrice(),
            'date_start'          => $productDiscount->getDateStart(),
            'date_end'            => $productDiscount->getDateEnd()
        ];
    }
}
