<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Sale;

use Sypa\Model\Sale\OrderTotal;

class OrderTotalHydrator {
    const REQUIRED_DATA = [
        'order_total_id',
        'order_id',
        'code',
        'title',
        'value',
        'sort_order'
    ];

    /**
     * @param array $data
     * @return OrderTotal
     * @throws \Exception
     */
    public function hydrate(array $data): OrderTotal {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create OrderTotal from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'order_total_id' => $order_total_id,
            'order_id'       => $order_id,
            'code'           => $code,
            'title'          => $title,
            'value'          => $value,
            'sort_order'     => $sort_order,

        ) = $data;

        return new OrderTotal(
            $order_total_id,
            $order_id,
            $code,
            $title,
            $value,
            $sort_order
        );
    }

    /**
     * @param OrderTotal $orderTotal
     * @return array<string, mixed>
     */
    public function extract(OrderTotal $orderTotal): array {
        return [
            'order_total_id' => $orderTotal->getOrderTotalId(),
            'order_id'       => $orderTotal->getOrderId(),
            'code'           => $orderTotal->getCode(),
            'title'          => $orderTotal->getTitle(),
            'value'          => $orderTotal->getValue(),
            'sort_order'     => $orderTotal->getSortOrder(),

        ];
    }
}
