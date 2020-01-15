<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductOption {
    /**
     * @var int
     */
    private int $product_option_id;
    /**
     * @var int
     */
    private int $product_id;
    /**
     * @var int
     */
    private int $option_id;
    /**
     * @var string
     */
    private string $value;
    /**
     * @var bool
     */
    private bool $required;

    /**
     * @param int $product_option_id
     * @param int $product_id
     * @param int $option_id
     * @param string $value
     * @param bool $required
     */
    public function __construct(
        int $product_option_id,
        int $product_id,
        int $option_id,
        string $value,
        bool $required
    ) {
        $this->product_option_id = $product_option_id;
        $this->product_id = $product_id;
        $this->option_id = $option_id;
        $this->value = $value;
        $this->required = $required;
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
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool {
        return $this->required;
    }
}
