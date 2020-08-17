<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductOption {
    private int $product_option_id;
    private int $product_id;
    private int $option_id;
    private string $value;
    private bool $required;

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

    public function getProductOptionId(): int {
        return $this->product_option_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getOptionId(): int {
        return $this->option_id;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function isRequired(): bool {
        return $this->required;
    }
}
