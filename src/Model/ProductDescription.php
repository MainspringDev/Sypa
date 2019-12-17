<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductDescription {
    /**
     * @var int
     */
    private $product_id;
    /**
     * @var int
     */
    private $language_id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $tag;
    /**
     * @var string
     */
    private $meta_title;
    /**
     * @var string
     */
    private $meta_description;
    /**
     * @var string
     */
    private $meta_keyword;

    /**
     * @param int $product_id
     * @param int $language_id
     * @param string $name
     * @param string $description
     * @param string $tag
     * @param string $meta_title
     * @param string $meta_description
     * @param string $meta_keyword
     */
    public function __construct(
        int $product_id,
        int $language_id,
        string $name,
        string $description,
        string $tag,
        string $meta_title,
        string $meta_description,
        string $meta_keyword
    ) {
        $this->product_id = $product_id;
        $this->language_id = $language_id;
        $this->name = $name;
        $this->description = $description;
        $this->tag = $tag;
        $this->meta_title = $meta_title;
        $this->meta_description = $meta_description;
        $this->meta_keyword = $meta_keyword;
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
    public function getLanguageId(): int {
        return $this->language_id;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getTag(): string {
        return $this->tag;
    }

    /**
     * @return string
     */
    public function getMetaTitle(): string {
        return $this->meta_title;
    }

    /**
     * @return string
     */
    public function getMetaDescription(): string {
        return $this->meta_description;
    }

    /**
     * @return string
     */
    public function getMetaKeyword(): string {
        return $this->meta_keyword;
    }
}
