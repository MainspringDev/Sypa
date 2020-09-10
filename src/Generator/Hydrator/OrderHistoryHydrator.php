<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Sale\OrderHistory;

class OrderHistoryHydrator {
    const REQUIRED_DATA = [
        'order_history_id',
        'order_id',
        'order_status_id',
        'notify',
        'comment',
        'date_added'
    ];

    /**
     * @param array $data
     * @return OrderHistory
     * @throws \Exception
     */
    public function hydrate(array $data): OrderHistory {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create OrderHistory from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'order_history_id' => $order_history_id,
            'order_id'         => $order_id,
            'order_status_id'  => $order_status_id,
            'notify'           => $notify,
            'comment'          => $comment,
            'date_added'       => $date_added,

        ) = $data;

        return new OrderHistory(
            $order_history_id,
            $order_id,
            $order_status_id,
            $notify,
            $comment,
            $date_added
        );
    }

    /**
     * @param OrderHistory $orderHistory
     * @return array<string, mixed>
     */
    public function extract(OrderHistory $orderHistory): array {
        return [
            'order_history_id' => $orderHistory->getOrderHistoryId(),
            'order_id'         => $orderHistory->getOrderId(),
            'order_status_id'  => $orderHistory->getOrderStatusId(),
            'notify'           => $orderHistory->isNotify(),
            'comment'          => $orderHistory->getComment(),
            'date_added'       => $orderHistory->getDateAdded(),

        ];
    }
}
