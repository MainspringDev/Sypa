<?php

declare(strict_types=1);

namespace Sypa\Model;

class VoucherTheme {
    private int $voucher_theme_id;
    private string $image;

    public function __construct(int $voucher_theme_id, string $image) {
        $this->voucher_theme_id = $voucher_theme_id;
        $this->image = $image;
    }

    public function getVoucherThemeId(): int {
        return $this->voucher_theme_id;
    }

    public function getImage(): string {
        return $this->image;
    }
}
