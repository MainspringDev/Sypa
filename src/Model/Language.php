<?php

declare(strict_types=1);

namespace Sypa\Model;

class Language {
    private int $language_id;
    private string $name;
    private string $code;
    private string $locale;
    private string $image;
    private int $sort_order;
    private bool $status;

    public function __construct(
        int $language_id,
        string $name,
        string $code,
        string $locale,
        string $image,
        int $sort_order,
        bool $status
    ) {
        $this->language_id = $language_id;
        $this->name = $name;
        $this->code = $code;
        $this->locale = $locale;
        $this->image = $image;
        $this->sort_order = $sort_order;
        $this->status = $status;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getLocale(): string {
        return $this->locale;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }

    public function isStatus(): bool {
        return $this->status;
    }
}
