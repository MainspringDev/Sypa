<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Sale;

use Sypa\Model\Sale\OrderOption;

class OrderOptionHydrator {
    const REQUIRED_DATA = [
        'order_option_id',
        'order_id',
        'order_product_id',
        'product_option_id',
        'product_option_value_id',
        'name',
        'value',
        'type'
    ];

    /**
     * @param array $data
     * @return OrderOption
     * @throws \Exception
     */
    public function hydrate(array $data): OrderOption {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create OrderOption from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'order_option_id'         => $order_option_id,
            'order_id'                => $order_id,
            'order_product_id'        => $order_product_id,
            'product_option_id'       => $product_option_id,
            'product_option_value_id' => $product_option_value_id,
            'name'                    => $name,
            'value'                   => $value,
            'type'                    => $type,

        ) = $data;

        return new OrderOption(
            $order_option_id,
            $order_id,
            $order_product_id,
            $product_option_id,
            $product_option_value_id,
            $name,
            $value,
            $type
        );
    }

    /**
     * @param OrderOption $orderOption
     * @return array<string, mixed>
     */
    public function extract(OrderOption $orderOption): array {
        return [
            'order_option_id'         => $orderOption->getOrderOptionId(),
            'order_id'                => $orderOption->getOrderId(),
            'order_product_id'        => $orderOption->getOrderProductId(),
            'product_option_id'       => $orderOption->getProductOptionId(),
            'product_option_value_id' => $orderOption->getProductOptionValueId(),
            'name'                    => $orderOption->getName(),
            'value'                   => $orderOption->getValue(),
            'type'                    => $orderOption->getType(),

        ];
    }
}
