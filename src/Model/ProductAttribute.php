<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductAttribute {
    /**
     * @var int
     */
    private $product_id;
    /**
     * @var int
     */
    private $attribute_id;
    /**
     * @var int
     */
    private $language_id;
    /**
     * @var string
     */
    private $text;

    /**
     * @param int $product_id
     * @param int $attribute_id
     * @param int $language_id
     * @param string $text
     */
    public function __construct(int $product_id, int $attribute_id, int $language_id, string $text) {
        $this->product_id = $product_id;
        $this->attribute_id = $attribute_id;
        $this->language_id = $language_id;
        $this->text = $text;
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
    public function getAttributeId(): int {
        return $this->attribute_id;
    }

    /**
     * @return int
     */
    public function getLanguageId(): int {
        return $this->language_id;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}
