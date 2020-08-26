<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class ProductToDownload {
    private int $product_id;
    private int $download_id;

    public function __construct(int $product_id, int $download_id) {
        $this->product_id = $product_id;
        $this->download_id = $download_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getDownloadId(): int {
        return $this->download_id;
    }
}
