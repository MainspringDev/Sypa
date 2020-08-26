<?php

declare(strict_types=1);

namespace Sypa\Model\Information;

class InformationDescription {
    private int $information_id;
    private int $language_id;
    private string $title;
    private string $description;
    private string $meta_title;
    private string $meta_description;
    private string $meta_keyword;

    public function __construct(
        int $information_id,
        int $language_id,
        string $title,
        string $description,
        string $meta_title,
        string $meta_description,
        string $meta_keyword
    ) {
        $this->information_id = $information_id;
        $this->language_id = $language_id;
        $this->title = $title;
        $this->description = $description;
        $this->meta_title = $meta_title;
        $this->meta_description = $meta_description;
        $this->meta_keyword = $meta_keyword;
    }

    public function getInformationId(): int {
        return $this->information_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getTitle(): string {
        return $this->title;
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
