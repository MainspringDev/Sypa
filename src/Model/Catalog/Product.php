<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class Product {
    private int $product_id;
    private string $sku;
    private string $upc;
    private string $ean;
    private string $jan;
    private string $isbn;
    private string $mpn;
    private string $location;
    private int $quantity;
    private int $minimum;
    private bool $subtract;
    private int $stock_status_id;
    private string $image;
    private int $manufacturer_id;
    private bool $shipping;
    private float $price;
    private float $cost;
    private int $points;
    private int $tax_class_id;
    private \DateTimeImmutable $date_available;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;
    private float $weight;
    private int $weight_class_id;
    private float $length;
    private float $width;
    private float $height;
    private int $length_class_id;
    private int $sort_order;
    private bool $status;
    private int $viewed;

    public function __construct(
        int $product_id,
        string $sku,
        string $upc,
        string $ean,
        string $jan,
        string $isbn,
        string $mpn,
        string $location,
        int $quantity,
        int $minimum,
        bool $subtract,
        int $stock_status_id,
        string $image,
        int $manufacturer_id,
        bool $shipping,
        float $price,
        float $cost,
        int $points,
        int $tax_class_id,
        \DateTimeImmutable $date_available,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified,
        float $weight,
        int $weight_class_id,
        float $length,
        float $width,
        float $height,
        int $length_class_id,
        int $sort_order,
        bool $status,
        int $viewed
    ) {
        $this->product_id = $product_id;
        $this->sku = $sku;
        $this->upc = $upc;
        $this->ean = $ean;
        $this->jan = $jan;
        $this->isbn = $isbn;
        $this->mpn = $mpn;
        $this->location = $location;
        $this->quantity = $quantity;
        $this->minimum = $minimum;
        $this->subtract = $subtract;
        $this->stock_status_id = $stock_status_id;
        $this->image = $image;
        $this->manufacturer_id = $manufacturer_id;
        $this->shipping = $shipping;
        $this->price = $price;
        $this->cost = $cost;
        $this->points = $points;
        $this->tax_class_id = $tax_class_id;
        $this->date_available = $date_available;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
        $this->weight = $weight;
        $this->weight_class_id = $weight_class_id;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->length_class_id = $length_class_id;
        $this->sort_order = $sort_order;
        $this->status = $status;
        $this->viewed = $viewed;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getSku(): string {
        return $this->sku;
    }

    public function getUpc(): string {
        return $this->upc;
    }

    public function getEan(): string {
        return $this->ean;
    }

    public function getJan(): string {
        return $this->jan;
    }

    public function getIsbn(): string {
        return $this->isbn;
    }

    public function getMpn(): string {
        return $this->mpn;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getMinimum(): int {
        return $this->minimum;
    }

    public function isSubtract(): bool {
        return $this->subtract;
    }

    public function getStockStatusId(): int {
        return $this->stock_status_id;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getManufacturerId(): int {
        return $this->manufacturer_id;
    }

    public function isShipping(): bool {
        return $this->shipping;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getCost(): float {
        return $this->cost;
    }

    public function getPoints(): int {
        return $this->points;
    }

    public function getTaxClassId(): int {
        return $this->tax_class_id;
    }

    public function getDateAvailable(): \DateTimeImmutable {
        return $this->date_available;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    public function getWeight(): float {
        return $this->weight;
    }

    public function getWeightClassId(): int {
        return $this->weight_class_id;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getLengthClassId(): int {
        return $this->length_class_id;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }

    public function getViewed(): int {
        return $this->viewed;
    }

    public function isStatus(): bool {
        return $this->status;
    }
}
