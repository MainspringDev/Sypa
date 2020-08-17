<?php

declare(strict_types=1);

namespace Sypa\Model;

class DownloadDescription {
    private int $download_id;
    private int $language_id;
    private string $name;

    public function __construct(int $download_id, int $language_id, string $name) {
        $this->download_id = $download_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getDownloadId(): int {
        return $this->download_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
