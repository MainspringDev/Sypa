<?php

declare(strict_types=1);

namespace Sypa\Model;

class OrderShipment {
    private int $order_shipment_id;
    private int $order_id;
    private \DateTimeImmutable $date_added;
    private string $shipping_courier_id;
    private string $tracking_number;

    public function __construct(
        int $order_shipment_id,
        int $order_id,
        \DateTimeImmutable $date_added,
        string $shipping_courier_id,
        string $tracking_number
    ) {
        $this->order_shipment_id = $order_shipment_id;
        $this->order_id = $order_id;
        $this->date_added = $date_added;
        $this->shipping_courier_id = $shipping_courier_id;
        $this->tracking_number = $tracking_number;
    }

    public function getOrderShipmentId(): int {
        return $this->order_shipment_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getShippingCourierId(): string {
        return $this->shipping_courier_id;
    }

    public function getTrackingNumber(): string {
        return $this->tracking_number;
    }
}
