<?php

declare(strict_types=1);

namespace Sypa\Model;

class ExtensionInstall {
    private int $extension_install_id;
    private int $extension_id;
    private int $extension_download_id;
    private string $filename;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $extension_install_id,
        int $extension_id,
        int $extension_download_id,
        string $filename,
        \DateTimeImmutable $date_added
    ) {
        $this->extension_install_id = $extension_install_id;
        $this->extension_id = $extension_id;
        $this->extension_download_id = $extension_download_id;
        $this->filename = $filename;
        $this->date_added = $date_added;
    }

    public function getExtensionInstallId(): int {
        return $this->extension_install_id;
    }

    public function getExtensionId(): int {
        return $this->extension_id;
    }

    public function getExtensionDownloadId(): int {
        return $this->extension_download_id;
    }

    public function getFilename(): string {
        return $this->filename;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
