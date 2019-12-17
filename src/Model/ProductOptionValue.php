<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductOptionValue {
    /**
     * @var int
     */
    private $product_option_value_id;
    /**
     * @var int
     */
    private $product_option_id;
    /**
     * @var int
     */
    private $product_id;
    /**
     * @var int
     */
    private $option_id;
    /**
     * @var int
     */
    private $option_value_id;
    /**
     * @var int
     */
    private $quantity;
    /**
     * @var bool
     */
    private $subtract;
    /**
     * @var float
     */
    private $price;
    /**
     * @var NumberSignPrefixEnum
     */
    private $price_prefix;
    /**
     * @var int
     */
    private $points;
    /**
     * @var NumberSignPrefixEnum
     */
    private $points_prefix;
    /**
     * @var float
     */
    private $weight;
    /**
     * @var NumberSignPrefixEnum
     */
    private $weight_prefix;

    /**
     * @param int $product_option_value_id
     * @param int $product_option_id
     * @param int $product_id
     * @param int $option_id
     * @param int $option_value_id
     * @param int $quantity
     * @param bool $subtract
     * @param float $price
     * @param NumberSignPrefixEnum $price_prefix
     * @param int $points
     * @param NumberSignPrefixEnum $points_prefix
     * @param float $weight
     * @param NumberSignPrefixEnum $weight_prefix
     */
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

    /**
     * @return int
     */
    public function getProductOptionValueId(): int {
        return $this->product_option_value_id;
    }

    /**
     * @return int
     */
    public function getProductOptionId(): int {
        return $this->product_option_id;
    }

    /**
     * @return int
     */
    public function getProductId(): int {
        return $this->product_id;
    }

    /**
     * @return int
     */
    public function getOptionId(): int {
        return $this->option_id;
    }

    /**
     * @return int
     */
    public function getOptionValueId(): int {
        return $this->option_value_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * @return bool
     */
    public function isSubtract(): bool {
        return $this->subtract;
    }

    /**
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * @return NumberSignPrefixEnum
     */
    public function getPricePrefix(): NumberSignPrefixEnum {
        return $this->price_prefix;
    }

    /**
     * @return int
     */
    public function getPoints(): int {
        return $this->points;
    }

    /**
     * @return NumberSignPrefixEnum
     */
    public function getPointsPrefix(): NumberSignPrefixEnum {
        return $this->points_prefix;
    }

    /**
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * @return NumberSignPrefixEnum
     */
    public function getWeightPrefix(): NumberSignPrefixEnum {
        return $this->weight_prefix;
    }
}
