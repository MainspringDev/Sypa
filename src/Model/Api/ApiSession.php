<?php

declare(strict_types=1);

namespace Sypa\Model\Api;

class ApiSession {
    private int $api_session_id;
    private int $api_id;
    private string $session_id;
    private string $ip;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $api_session_id,
        int $api_id,
        string $session_id,
        string $ip,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->api_session_id = $api_session_id;
        $this->api_id = $api_id;
        $this->session_id = $session_id;
        $this->ip = $ip;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getApiSessionId(): int {
        return $this->api_session_id;
    }

    public function getApiId(): int {
        return $this->api_id;
    }

    public function getSessionId(): string {
        return $this->session_id;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
