<?php

declare(strict_types=1);

namespace Sypa\Model;

class FilterDescription {
    private int $filter_id;
    private int $language_id;
    private int $filter_group_id;
    private string $name;

    public function __construct(int $filter_id, int $language_id, int $filter_group_id, string $name) {
        $this->filter_id = $filter_id;
        $this->language_id = $language_id;
        $this->filter_group_id = $filter_group_id;
        $this->name = $name;
    }

    public function getFilterId(): int {
        return $this->filter_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getFilterGroupId(): int {
        return $this->filter_group_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
