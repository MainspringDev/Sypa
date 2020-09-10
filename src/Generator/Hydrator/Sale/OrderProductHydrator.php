<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Sale;

use Sypa\Model\Sale\OrderProduct;

class OrderProductHydrator {
    const REQUIRED_DATA = [
        'order_product_id',
        'order_id',
        'product_id',
        'master_id',
        'name',
        'model',
        'quantity',
        'price',
        'total',
        'tax',
        'reward'
    ];

    /**
     * @param array $data
     * @return OrderProduct
     * @throws \Exception
     */
    public function hydrate(array $data): OrderProduct {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create OrderProduct from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'order_product_id' => $order_product_id,
            'order_id'         => $order_id,
            'product_id'       => $product_id,
            'master_id'        => $master_id,
            'name'             => $name,
            'model'            => $model,
            'quantity'         => $quantity,
            'price'            => $price,
            'total'            => $total,
            'tax'              => $tax,
            'reward'           => $reward,

        ) = $data;

        return new OrderProduct(
            $order_product_id,
            $order_id,
            $product_id,
            $master_id,
            $name,
            $model,
            $quantity,
            $price,
            $total,
            $tax,
            $reward
        );
    }

    /**
     * @param OrderProduct $orderProduct
     * @return array<string, mixed>
     */
    public function extract(OrderProduct $orderProduct): array {
        return [
            'order_product_id' => $orderProduct->getOrderProductId(),
            'order_id'         => $orderProduct->getOrderId(),
            'product_id'       => $orderProduct->getProductId(),
            'master_id'        => $orderProduct->getMasterId(),
            'name'             => $orderProduct->getName(),
            'model'            => $orderProduct->getModel(),
            'quantity'         => $orderProduct->getQuantity(),
            'price'            => $orderProduct->getPrice(),
            'total'            => $orderProduct->getTotal(),
            'tax'              => $orderProduct->getTax(),
            'reward'           => $orderProduct->getReward(),

        ];
    }
}
