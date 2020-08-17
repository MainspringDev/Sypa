<?php

declare(strict_types=1);

namespace Sypa\Model;

class FilterGroupDescription {
    private int $filter_group_id;
    private int $language_id;
    private string $name;

    public function __construct(int $filter_group_id, int $language_id, string $name) {
        $this->filter_group_id = $filter_group_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getFilterGroupId(): int {
        return $this->filter_group_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
