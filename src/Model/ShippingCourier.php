<?php

declare(strict_types=1);

namespace Sypa\Model;

class ShippingCourier {
    private int $shipping_courier_id;
    private string $shipping_courier_code;
    private string $shipping_courier_name;

    public function __construct(
        int $shipping_courier_id,
        string $shipping_courier_code,
        string $shipping_courier_name
    ) {
        $this->shipping_courier_id = $shipping_courier_id;
        $this->shipping_courier_code = $shipping_courier_code;
        $this->shipping_courier_name = $shipping_courier_name;
    }

    public function getShippingCourierId(): int {
        return $this->shipping_courier_id;
    }

    public function getShippingCourierCode(): string {
        return $this->shipping_courier_code;
    }

    public function getShippingCourierName(): string {
        return $this->shipping_courier_name;
    }
}
