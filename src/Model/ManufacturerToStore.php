<?php

declare(strict_types=1);

namespace Sypa\Model;

class ManufacturerToStore {
    private int $manufacturer_id;
    private int $store_id;

    public function __construct(int $manufacturer_id, int $store_id) {
        $this->manufacturer_id = $manufacturer_id;
        $this->store_id = $store_id;
    }

    public function getManufacturerId(): int {
        return $this->manufacturer_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }
}
