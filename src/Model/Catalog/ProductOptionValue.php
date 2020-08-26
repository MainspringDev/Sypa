<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductOptionValue {
    private int $product_option_value_id;
    private int $product_option_id;
    private int $product_id;
    private int $option_id;
    private int $option_value_id;
    private int $quantity;
    private bool $subtract;
    private float $price;
    private NumberSignPrefixEnum $price_prefix;
    private int $points;
    private NumberSignPrefixEnum $points_prefix;
    private float $weight;
    private NumberSignPrefixEnum $weight_prefix;

    public function __construct(
        int $product_option_value_id,
        int $product_option_id,
        int $product_id,
        int $option_id,
        int $option_value_id,
        int $quantity,
        bool $subtract,
        float $price,
        NumberSignPrefixEnum $price_prefix,
        int $points,
        NumberSignPrefixEnum $points_prefix,
        float $weight,
        NumberSignPrefixEnum $weight_prefix
    ) {
        $this->product_option_value_id = $product_option_value_id;
        $this->product_option_id = $product_option_id;
        $this->product_id = $product_id;
        $this->option_id = $option_id;
        $this->option_value_id = $option_value_id;
        $this->quantity = $quantity;
        $this->subtract = $subtract;
        $this->price = $price;
        $this->price_prefix = $price_prefix;
        $this->points = $points;
        $this->points_prefix = $points_prefix;
        $this->weight = $weight;
        $this->weight_prefix = $weight_prefix;
    }

    public function getProductOptionValueId(): int {
        return $this->product_option_value_id;
    }

    public function getProductOptionId(): int {
        return $this->product_option_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getOptionId(): int {
        return $this->option_id;
    }

    public function getOptionValueId(): int {
        return $this->option_value_id;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function isSubtract(): bool {
        return $this->subtract;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getPricePrefix(): NumberSignPrefixEnum {
        return $this->price_prefix;
    }

    public function getPoints(): int {
        return $this->points;
    }

    public function getPointsPrefix(): NumberSignPrefixEnum {
        return $this->points_prefix;
    }

    public function getWeight(): float {
        return $this->weight;
    }

    public function getWeightPrefix(): NumberSignPrefixEnum {
        return $this->weight_prefix;
    }
}
