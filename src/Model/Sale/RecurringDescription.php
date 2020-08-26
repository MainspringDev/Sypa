<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class RecurringDescription {
    private int $recurring_id;
    private int $language_id;
    private string $name;

    public function __construct(int $recurring_id, int $language_id, string $name) {
        $this->recurring_id = $recurring_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getRecurringId(): int {
        return $this->recurring_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
