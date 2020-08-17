<?php

declare(strict_types=1);

namespace Sypa\Model;

class Api {
    private int $api_id;
    private string $username;
    private string $key;
    private bool $status;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $api_id,
        string $username,
        string $key,
        bool $status,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->api_id = $api_id;
        $this->username = $username;
        $this->key = $key;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getApiId(): int {
        return $this->api_id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getKey(): string {
        return $this->key;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
