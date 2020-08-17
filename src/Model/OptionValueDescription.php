<?php

declare(strict_types=1);

namespace Sypa\Model;

class OptionValueDescription {
    private int $option_value_id;
    private int $language_id;
    private int $option_id;
    private string $name;

    public function __construct(int $option_value_id, int $language_id, int $option_id, string $name) {
        $this->option_value_id = $option_value_id;
        $this->language_id = $language_id;
        $this->option_id = $option_id;
        $this->name = $name;
    }

    public function getOptionValueId(): int {
        return $this->option_value_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getOptionId(): int {
        return $this->option_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
