<?php

declare(strict_types=1);

namespace Sypa\Model\Information;

class Gdpr {
    private int $gdpr_id;
    private int $store_id;
    private int $language_id;
    private string $code;
    private string $email;
    private string $action;
    private bool $status;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $gdpr_id,
        int $store_id,
        int $language_id,
        string $code,
        string $email,
        string $action,
        bool $status,
        \DateTimeImmutable $date_added
    ) {
        $this->gdpr_id = $gdpr_id;
        $this->store_id = $store_id;
        $this->language_id = $language_id;
        $this->code = $code;
        $this->email = $email;
        $this->action = $action;
        $this->status = $status;
        $this->date_added = $date_added;
    }

    public function getGdprId(): int {
        return $this->gdpr_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getAction(): string {
        return $this->action;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
