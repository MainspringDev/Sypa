<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class OptionDescription {
    private int $option_id;
    private int $language_id;
    private string $name;

    public function __construct(int $option_id, int $language_id, string $name) {
        $this->option_id = $option_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getOptionId(): int {
        return $this->option_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
