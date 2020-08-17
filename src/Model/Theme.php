<?php

declare(strict_types=1);

namespace Sypa\Model;

class Theme {
    private int $theme_id;
    private int $store_id;
    private string $theme;
    private string $route;
    private string $code;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $theme_id,
        int $store_id,
        string $theme,
        string $route,
        string $code,
        \DateTimeImmutable $date_added
    ) {
        $this->theme_id = $theme_id;
        $this->store_id = $store_id;
        $this->theme = $theme;
        $this->route = $route;
        $this->code = $code;
        $this->date_added = $date_added;
    }

    public function getThemeId(): int {
        return $this->theme_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getTheme(): string {
        return $this->theme;
    }

    public function getRoute(): string {
        return $this->route;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
