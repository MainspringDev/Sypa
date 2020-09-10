<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator\Sale;

use Sypa\Model\Sale\OrderStatus;

class OrderStatusHydrator {
    const REQUIRED_DATA = [
        'order_status_id',
        'language_id',
        'name'
    ];

    /**
     * @param array $data
     * @return OrderStatus
     * @throws \Exception
     */
    public function hydrate(array $data): OrderStatus {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create order status from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'order_status_id' => $order_status_id,
            'language_id'     => $language_id,
            'name'            => $name
        ) = $data;

        return new OrderStatus($order_status_id, $language_id, $name);
    }

    /**
     * @param OrderStatus $orderStatus
     * @return array<string, mixed>
     */
    public function extract(OrderStatus $orderStatus): array {
        return [
            'order_status_id' => $orderStatus->getOrderStatusId(),
            'language_id'     => $orderStatus->getLanguageId(),
            'name'            => $orderStatus->getName()
        ];
    }
}
