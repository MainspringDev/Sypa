<?php

declare(strict_types=1);

namespace Sypa\Model;

class Session {
    private string $session_id;
    private string $data;
    private \DateTimeImmutable $expire;

    public function __construct(string $session_id, string $data, \DateTimeImmutable $expire) {
        $this->session_id = $session_id;
        $this->data = $data;
        $this->expire = $expire;
    }

    public function getSessionId(): string {
        return $this->session_id;
    }

    public function getData(): string {
        return $this->data;
    }

    public function getExpire(): \DateTimeImmutable {
        return $this->expire;
    }
}
