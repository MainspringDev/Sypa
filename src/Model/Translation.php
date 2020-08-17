<?php

declare(strict_types=1);

namespace Sypa\Model;

class Translation {
    private int $translation_id;
    private int $store_id;
    private int $language_id;
    private string $route;
    private string $key;
    private string $value;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $translation_id,
        int $store_id,
        int $language_id,
        string $route,
        string $key,
        string $value,
        \DateTimeImmutable $date_added
    ) {
        $this->translation_id = $translation_id;
        $this->store_id = $store_id;
        $this->language_id = $language_id;
        $this->route = $route;
        $this->key = $key;
        $this->value = $value;
        $this->date_added = $date_added;
    }

    public function getTranslationId(): int {
        return $this->translation_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getRoute(): string {
        return $this->route;
    }

    public function getKey(): string {
        return $this->key;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
