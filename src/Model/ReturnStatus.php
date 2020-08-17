<?php

declare(strict_types=1);

namespace Sypa\Model;

class ReturnStatus {
    private int $return_status_id;
    private int $language_id;
    private string $name;

    public function __construct(int $return_status_id, int $language_id, string $name) {
        $this->return_status_id = $return_status_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getReturnStatusId(): int {
        return $this->return_status_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
