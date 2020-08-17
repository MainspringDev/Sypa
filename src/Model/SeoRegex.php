<?php

declare(strict_types=1);

namespace Sypa\Model;

class SeoRegex {
    private int $seo_regex_id;
    private string $name;
    private string $regex;
    private int $sort_order;

    public function __construct(int $seo_regex_id, string $name, string $regex, int $sort_order) {
        $this->seo_regex_id = $seo_regex_id;
        $this->name = $name;
        $this->regex = $regex;
        $this->sort_order = $sort_order;
    }

    public function getSeoRegexId(): int {
        return $this->seo_regex_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getRegex(): string {
        return $this->regex;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
