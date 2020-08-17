<?php

declare(strict_types=1);

namespace Sypa\Model;

class VoucherThemeDescription {
    private int $voucher_theme_id;
    private int $language_id;
    private string $name;

    public function __construct(int $voucher_theme_id, int $language_id, string $name) {
        $this->voucher_theme_id = $voucher_theme_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getVoucherThemeId(): int {
        return $this->voucher_theme_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
