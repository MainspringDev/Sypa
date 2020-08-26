<?php

declare(strict_types=1);

namespace Sypa\Model\Setting;

class ExtensionPath {
    private int $extension_path_id;
    private int $extension_install_id;
    private string $path;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $extension_path_id,
        int $extension_install_id,
        string $path,
        \DateTimeImmutable $date_added
    ) {
        $this->extension_path_id = $extension_path_id;
        $this->extension_install_id = $extension_install_id;
        $this->path = $path;
        $this->date_added = $date_added;
    }

    public function getExtensionPathId(): int {
        return $this->extension_path_id;
    }

    public function getExtensionInstallId(): int {
        return $this->extension_install_id;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
