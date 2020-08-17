<?php

declare(strict_types=1);

namespace Sypa\Model;

class OptionValue {
    private int $option_value_id;
    private int $option_id;
    private string $image;
    private int $sort_order;

    public function __construct(int $option_value_id, int $option_id, string $image, int $sort_order) {
        $this->option_value_id = $option_value_id;
        $this->option_id = $option_id;
        $this->image = $image;
        $this->sort_order = $sort_order;
    }

    public function getOptionValueId(): int {
        return $this->option_value_id;
    }

    public function getOptionId(): int {
        return $this->option_id;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
