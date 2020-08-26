<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class StockStatus {
    private int $stock_status_id;
    private int $language_id;
    private string $name;

    public function __construct(int $stock_status_id, int $language_id, string $name) {
        $this->stock_status_id = $stock_status_id;
        $this->language_id = $language_id;
        $this->name = $name;
    }

    public function getStockStatusId(): int {
        return $this->stock_status_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
