<?php

declare(strict_types=1);

namespace Sypa\Model;

class Module {
    private int $module_id;
    private string $name;
    private string $code;
    private string $setting;

    public function __construct(int $module_id, string $name, string $code, string $setting) {
        $this->module_id = $module_id;
        $this->name = $name;
        $this->code = $code;
        $this->setting = $setting;
    }

    public function getModuleId(): int {
        return $this->module_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getSetting(): string {
        return $this->setting;
    }
}
