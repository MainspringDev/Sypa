<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderProduct {
    private int $order_product_id;
    private int $order_id;
    private int $product_id;
    private int $master_id;
    private string $name;
    private string $model;
    private int $quantity;
    private float $price;
    private float $total;
    private float $tax;
    private int $reward;

    public function __construct(
        int $order_product_id,
        int $order_id,
        int $product_id,
        int $master_id,
        string $name,
        string $model,
        int $quantity,
        float $price,
        float $total,
        float $tax,
        int $reward
    ) {
        $this->order_product_id = $order_product_id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->master_id = $master_id;
        $this->name = $name;
        $this->model = $model;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->total = $total;
        $this->tax = $tax;
        $this->reward = $reward;
    }

    public function getOrderProductId(): int {
        return $this->order_product_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getMasterId(): int {
        return $this->master_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getTotal(): float {
        return $this->total;
    }

    public function getTax(): float {
        return $this->tax;
    }

    public function getReward(): int {
        return $this->reward;
    }
}
