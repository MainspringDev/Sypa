<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderOption {
    private int $order_option_id;
    private int $order_id;
    private int $order_product_id;
    private int $product_option_id;
    private int $product_option_value_id;
    private string $name;
    private string $value;
    private string $type;

    public function __construct(
        int $order_option_id,
        int $order_id,
        int $order_product_id,
        int $product_option_id,
        int $product_option_value_id,
        string $name,
        string $value,
        string $type
    ) {
        $this->order_option_id = $order_option_id;
        $this->order_id = $order_id;
        $this->order_product_id = $order_product_id;
        $this->product_option_id = $product_option_id;
        $this->product_option_value_id = $product_option_value_id;
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
    }

    public function getOrderOptionId(): int {
        return $this->order_option_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getOrderProductId(): int {
        return $this->order_product_id;
    }

    public function getProductOptionId(): int {
        return $this->product_option_id;
    }

    public function getProductOptionValueId(): int {
        return $this->product_option_value_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function getType(): string {
        return $this->type;
    }
}
