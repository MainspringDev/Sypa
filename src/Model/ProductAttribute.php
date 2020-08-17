<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductAttribute {
    private int $product_id;
    private int $attribute_id;
    private int $language_id;
    private string $text;

    public function __construct(int $product_id, int $attribute_id, int $language_id, string $text) {
        $this->product_id = $product_id;
        $this->attribute_id = $attribute_id;
        $this->language_id = $language_id;
        $this->text = $text;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getAttributeId(): int {
        return $this->attribute_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getText(): string {
        return $this->text;
    }
}
