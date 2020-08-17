<?php

declare(strict_types=1);

namespace Sypa\Model;

class SeoUrl {
    private int $seo_url_id;
    private int $store_id;
    private int $language_id;
    private string $keyword;
    private string $query;
    private string $push;

    public function __construct(
        int $seo_url_id,
        int $store_id,
        int $language_id,
        string $keyword,
        string $query,
        string $push
    ) {
        $this->seo_url_id = $seo_url_id;
        $this->store_id = $store_id;
        $this->language_id = $language_id;
        $this->keyword = $keyword;
        $this->query = $query;
        $this->push = $push;
    }

    public function getSeoUrlId(): int {
        return $this->seo_url_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getKeyword(): string {
        return $this->keyword;
    }

    public function getQuery(): string {
        return $this->query;
    }

    public function getPush(): string {
        return $this->push;
    }
}
