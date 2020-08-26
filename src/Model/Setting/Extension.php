<?php

declare(strict_types=1);

namespace Sypa\Model\Setting;

class Extension {
    private int $extension_id;
    private string $type;
    private string $code;

    public function __construct(int $extension_id, string $type, string $code) {
        // @todo validation

        $this->extension_id = $extension_id;
        $this->type = $type;
        $this->code = $code;
    }

    public function getExtensionId(): int {
        return $this->extension_id;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getCode(): string {
        return $this->code;
    }
}
