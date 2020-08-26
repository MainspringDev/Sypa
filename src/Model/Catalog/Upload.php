<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class Upload {
    private int $upload_id;
    private string $name;
    private string $filename;
    private string $code;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $upload_id,
        string $name,
        string $filename,
        string $code,
        \DateTimeImmutable $date_added
    ) {
        $this->upload_id = $upload_id;
        $this->name = $name;
        $this->filename = $filename;
        $this->code = $code;
        $this->date_added = $date_added;
    }

    public function getUploadId(): int {
        return $this->upload_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getFilename(): string {
        return $this->filename;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
