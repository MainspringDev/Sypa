<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class ReturnAction {
    private int $return_action_id;
    private int $language_id;
    private string $name;

    public function __construct(int $return_action_id, int $language_id, string $name) {
        $this->return_action_id = $return_action_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getReturnActionId(): int {
        return $this->return_action_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
