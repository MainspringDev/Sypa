<?php

declare(strict_types=1);

namespace Sypa\Model;

class Product {
    /**
     * @var int
     */
    private int $product_id;
    /**
     * @var string
     */
    private string $sku;
    /**
     * @var string
     */
    private string $upc;
    /**
     * @var string
     */
    private string $ean;
    /**
     * @var string
     */
    private string $jan;
    /**
     * @var string
     */
    private string $isbn;
    /**
     * @var string
     */
    private string $mpn;
    /**
     * @var string
     */
    private string $location;
    /**
     * @var int
     */
    private int $quantity;
    /**
     * @var int
     */
    private int $minimum;
    /**
     * @var bool
     */
    private bool $subtract;
    /**
     * @var int
     */
    private int $stock_status_id;
    /**
     * @var string
     */
    private string $image;
    /**
     * @var int
     */
    private int $manufacturer_id;
    /**
     * @var bool
     */
    private bool $shipping;
    /**
     * @var float
     */
    private float $price;
    /**
     * @var float
     */
    private float $cost;
    /**
     * @var int
     */
    private int $points;
    /**
     * @var int
     */
    private int $tax_class_id;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_available;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_added;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_modified;
    /**
     * @var float
     */
    private float $weight;
    /**
     * @var int
     */
    private int $weight_class_id;
    /**
     * @var float
     */
    private float $length;
    /**
     * @var float
     */
    private float $width;
    /**
     * @var float
     */
    private float $height;
    /**
     * @var int
     */
    private int $length_class_id;
    /**
     * @var int
     */
    private int $sort_order;
    /**
     * @var bool
     */
    private bool $status;
    /**
     * @var int
     */
    private int $viewed;

    /**
     * @param int $product_id
     * @param string $sku
     * @param string $upc
     * @param string $ean
     * @param string $jan
     * @param string $isbn
     * @param string $mpn
     * @param string $location
     * @param int $quantity
     * @param int $minimum
     * @param bool $subtract
     * @param int $stock_status_id
     * @param string $image
     * @param int $manufacturer_id
     * @param bool $shipping
     * @param float $price
     * @param float $cost
     * @param int $points
     * @param int $tax_class_id
     * @param \DateTimeImmutable $date_available
     * @param \DateTimeImmutable $date_added
     * @param \DateTimeImmutable $date_modified
     * @param float $weight
     * @param int $weight_class_id
     * @param float $length
     * @param float $width
     * @param float $height
     * @param int $length_class_id
     * @param int $sort_order
     * @param bool $status
     * @param int $viewed
     */
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

    /**
     * @return int
     */
    public function getProductId(): int {
        return $this->product_id;
    }

    /**
     * @return string
     */
    public function getSku(): string {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getUpc(): string {
        return $this->upc;
    }

    /**
     * @return string
     */
    public function getEan(): string {
        return $this->ean;
    }

    /**
     * @return string
     */
    public function getJan(): string {
        return $this->jan;
    }

    /**
     * @return string
     */
    public function getIsbn(): string {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getMpn(): string {
        return $this->mpn;
    }

    /**
     * @return string
     */
    public function getLocation(): string {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getMinimum(): int {
        return $this->minimum;
    }

    /**
     * @return bool
     */
    public function isSubtract(): bool {
        return $this->subtract;
    }

    /**
     * @return int
     */
    public function getStockStatusId(): int {
        return $this->stock_status_id;
    }

    /**
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * @return int
     */
    public function getManufacturerId(): int {
        return $this->manufacturer_id;
    }

    /**
     * @return bool
     */
    public function isShipping(): bool {
        return $this->shipping;
    }

    /**
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getCost(): float {
        return $this->cost;
    }

    /**
     * @return int
     */
    public function getPoints(): int {
        return $this->points;
    }

    /**
     * @return int
     */
    public function getTaxClassId(): int {
        return $this->tax_class_id;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateAvailable(): \DateTimeImmutable {
        return $this->date_available;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }

    /**
     * @return float
     */
    public function getWeight(): float {
        return $this->weight;
    }

    /**
     * @return int
     */
    public function getWeightClassId(): int {
        return $this->weight_class_id;
    }

    /**
     * @return float
     */
    public function getLength(): float {
        return $this->length;
    }

    /**
     * @return float
     */
    public function getWidth(): float {
        return $this->width;
    }

    /**
     * @return float
     */
    public function getHeight(): float {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getLengthClassId(): int {
        return $this->length_class_id;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int {
        return $this->sort_order;
    }

    /**
     * @return int
     */
    public function getViewed(): int {
        return $this->viewed;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }
}
