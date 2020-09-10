<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class Download {
    private int $download_id;
    private string $filename;
    private string $mask;
    private \DateTimeImmutable $dateAdded;

    public function __construct(int $download_id, string $filename, string $mask, \DateTimeImmutable $dateAdded) {
        $this->download_id = $download_id;
        $this->filename = $filename;
        $this->mask = $mask;
        $this->dateAdded = $dateAdded;
    }

    public function getDownloadId(): int {
        return $this->download_id;
    }

    public function getFilename(): string {
        return $this->filename;
    }

    public function getMask(): string {
        return $this->mask;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->dateAdded;
    }
}
