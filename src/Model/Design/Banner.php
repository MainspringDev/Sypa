<?php

declare(strict_types=1);

namespace Sypa\Model\Design;

class Banner {
    private int $banner_id;
    private string $name;
    private bool $status;

    public function __construct(int $banner_id, string $name, bool $status) {
        $this->banner_id = $banner_id;
        $this->name = $name;
        $this->status = $status;
    }

    public function getBannerId(): int {
        return $this->banner_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function isStatus(): bool {
        return $this->status;
    }
}
