<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductDescription {
    private int $product_description_id;
    private int $product_id;
    private int $language_id;
    private string $name;
    private string $description;
    private string $tag;
    private string $meta_title;
    private string $meta_description;
    private string $meta_keyword;

    public function __construct(
        int $product_description_id,
        int $product_id,
        int $language_id,
        string $name,
        string $description,
        string $tag,
        string $meta_title,
        string $meta_description,
        string $meta_keyword
    ) {
        $this->product_description_id = $product_description_id;
        $this->product_id = $product_id;
        $this->language_id = $language_id;
        $this->name = $name;
        $this->description = $description;
        $this->tag = $tag;
        $this->meta_title = $meta_title;
        $this->meta_description = $meta_description;
        $this->meta_keyword = $meta_keyword;
    }

    public function getProductDescriptionId(): int {
        return $this->product_description_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getTag(): string {
        return $this->tag;
    }

    public function getMetaTitle(): string {
        return $this->meta_title;
    }

    public function getMetaDescription(): string {
        return $this->meta_description;
    }

    public function getMetaKeyword(): string {
        return $this->meta_keyword;
    }
}
