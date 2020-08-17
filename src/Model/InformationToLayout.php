<?php

declare(strict_types=1);

namespace Sypa\Model;

class InformationToLayout {
    private int $information_id;
    private int $store_id;
    private int $layout_id;

    public function __construct(int $information_id, int $store_id, int $layout_id) {
        $this->information_id = $information_id;
        $this->store_id = $store_id;
        $this->layout_id = $layout_id;
    }

    public function getInformationId(): int {
        return $this->information_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getLayoutId(): int {
        return $this->layout_id;
    }
}
