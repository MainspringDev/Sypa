<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class ReturnReason {
    private int $return_reason_id;
    private int $language_id;
    private string $name;

    public function __construct(int $return_reason_id, int $language_id, string $name) {
        $this->return_reason_id = $return_reason_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getReturnReasonId(): int {
        return $this->return_reason_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
