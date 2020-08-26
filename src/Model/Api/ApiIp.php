<?php

declare(strict_types=1);

namespace Sypa\Model\Api;

class ApiIp {
    private int $api_ip_id;
    private int $api_id;
    private string $ip;

    public function __construct(int $api_ip_id, int $api_id, string $ip) {
        $this->api_ip_id = $api_ip_id;
        $this->api_id = $api_id;
        $this->ip = $ip;
    }

    public function getApiIpId(): int {
        return $this->api_ip_id;
    }

    public function getApiId(): int {
        return $this->api_id;
    }

    public function getIp(): string {
        return $this->ip;
    }
}
