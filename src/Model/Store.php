<?php

declare(strict_types=1);

namespace Sypa\Model;

class Store {
    private int $store_id;
    private string $name;
    private string $url;
    private string $ssl;

    public function __construct(int $store_id, string $name, string $url, string $ssl) {
        $this->store_id = $store_id;
        $this->name = $name;
        $this->url = $url;
        $this->ssl = $ssl;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getSsl(): string {
        return $this->ssl;
    }
}
