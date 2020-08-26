<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

use Sypa\Exception\InvalidResourceIdentifierException;

class CategoryDescription {
    private int $category_id;
    private int $language_id;
    private string $name;
    private string $description;
    private string $meta_title;
    private string $meta_description;
    private string $meta_keyword;

    public function __construct(
        int $category_id,
        int $language_id,
        string $name,
        string $description,
        string $meta_title,
        string $meta_description,
        string $meta_keyword
    ) {
        if ($category_id < 1) {
            throw new InvalidResourceIdentifierException(sprintf(
                "Invalid \$category_id '%s'.",
                $category_id
            ));
        }

        if ($language_id < 1) {
            throw new InvalidResourceIdentifierException(sprintf(
                "Invalid \$language_id '%s'.",
                $language_id
            ));
        }

        if (\mb_strlen($name) > 255) {
            throw new \InvalidArgumentException(sprintf(
                "Invalid parameter \$name. Name cannot be longer than 255 characters. Received name length %s.",
                \mb_strlen($name)
            ));
        }

        // Description is limited in bytes rather than characters
        if (strlen($description) > 65535) {
            throw new \InvalidArgumentException(sprintf(
                "Invalid parameters \$description. Description cannot be more than 65535 bytes. Received description length %s bytes.",
                \mb_strlen($description)
            ));
        }

        if (\mb_strlen($meta_title) > 255) {
            throw new \InvalidArgumentException(sprintf(
                "Invalid parameter \$meta_title. Name cannot be longer than 255 characters. Received meta title length %s.",
                \mb_strlen($meta_title)
            ));
        }

        if (\mb_strlen($meta_description) > 255) {
            throw new \InvalidArgumentException(sprintf(
                "Invalid parameter \$meta_description. Name cannot be longer than 255 characters. Received meta description length %s.",
                \mb_strlen($meta_description)
            ));
        }

        if (\mb_strlen($meta_keyword) > 255) {
            throw new \InvalidArgumentException(sprintf(
                "Invalid parameter \$meta_keyword. Name cannot be longer than 255 characters. Received meta keyword length %s.",
                \mb_strlen($meta_keyword)
            ));
        }

        $this->category_id = $category_id;
        $this->language_id = $language_id;
        $this->name = $name;
        $this->description = $description;
        $this->meta_title = $meta_title;
        $this->meta_description = $meta_description;
        $this->meta_keyword = $meta_keyword;
    }

    public function getCategoryId(): int {
        return $this->category_id;
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
