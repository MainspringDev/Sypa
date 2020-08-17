<?php

declare(strict_types=1);

namespace Sypa\Model;

class Setting {
    private int $setting_id;
    private int $store_id;
    private string $code;
    private string $key;
    private string $value;
    private bool $serialized;

    public function __construct(
        int $setting_id,
        int $store_id,
        string $code,
        string $key,
        string $value,
        bool $serialized
    ) {
        $this->setting_id = $setting_id;
        $this->store_id = $store_id;
        $this->code = $code;
        $this->key = $key;
        $this->value = $value;
        $this->serialized = $serialized;
    }

    public function getSettingId(): int {
        return $this->setting_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getKey(): string {
        return $this->key;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function isSerialized(): bool {
        return $this->serialized;
    }
}
