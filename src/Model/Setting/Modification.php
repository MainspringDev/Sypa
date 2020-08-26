<?php

declare(strict_types=1);

namespace Sypa\Model\Setting;

class Modification {
    private int $modification_id;
    private int $extension_install_id;
    private int $extension_download_id;
    private string $name;
    private string $code;
    private string $author;
    private string $version;
    private string $link;
    private string $xml;
    private bool $status;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $modification_id,
        int $extension_install_id,
        int $extension_download_id,
        string $name,
        string $code,
        string $author,
        string $version,
        string $link,
        string $xml,
        bool $status,
        \DateTimeImmutable $date_added
    ) {
        $this->modification_id = $modification_id;
        $this->extension_install_id = $extension_install_id;
        $this->extension_download_id = $extension_download_id;
        $this->name = $name;
        $this->code = $code;
        $this->author = $author;
        $this->version = $version;
        $this->link = $link;
        $this->xml = $xml;
        $this->status = $status;
        $this->date_added = $date_added;
    }

    public function getModificationId(): int {
        return $this->modification_id;
    }

    public function getExtensionInstallId(): int {
        return $this->extension_install_id;
    }

    public function getExtensionDownloadId(): int {
        return $this->extension_download_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getVersion(): string {
        return $this->version;
    }

    public function getLink(): string {
        return $this->link;
    }

    public function getXml(): string {
        return $this->xml;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
