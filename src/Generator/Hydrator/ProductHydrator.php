<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Catalog\Product;

class ProductHydrator {
    const REQUIRED_DATA = [
        'product_id',
        'model',
        'sku',
        'upc',
        'ean',
        'jan',
        'isbn',
        'mpn',
        'location',
        'quantity',
        'stock_status_id',
        'image',
        'manufacturer_id',
        'shipping',
        'price',
        'cost',
        'points',
        'tax_class_id',
        'date_available',
        'weight',
        'weight_class_id',
        'length',
        'width',
        'height',
        'length_class_id',
        'subtract',
        'minimum',
        'sort_order',
        'status',
        'viewed',
        'date_added',
        'date_modified'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Product
     * @throws \Exception
     */
    public function hydrate(array $data): Product {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create product from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'product_id'      => $product_id,
            'model'           => $model,
            'sku'             => $sku,
            'upc'             => $upc,
            'ean'             => $ean,
            'jan'             => $jan,
            'isbn'            => $isbn,
            'mpn'             => $mpn,
            'location'        => $location,
            'quantity'        => $quantity,
            'stock_status_id' => $stock_status_id,
            'image'           => $image,
            'manufacturer_id' => $manufacturer_id,
            'shipping'        => $shipping,
            'price'           => $price,
            'cost'            => $cost,
            'points'          => $points,
            'tax_class_id'    => $tax_class_id,
            'date_available'  => $date_available,
            'weight'          => $weight,
            'weight_class_id' => $weight_class_id,
            'length'          => $length,
            'width'           => $width,
            'height'          => $height,
            'length_class_id' => $length_class_id,
            'subtract'        => $subtract,
            'minimum'         => $minimum,
            'sort_order'      => $sort_order,
            'status'          => $status,
            'viewed'          => $viewed,
            'date_added'      => $date_added,
            'date_modified'   => $date_modified
        ) = $data;

        return new Product(
            $product_id,
            $sku,
            $upc,
            $ean,
            $jan,
            $isbn,
            $mpn,
            $location,
            $quantity,
            $minimum,
            $subtract,
            $stock_status_id,
            $image,
            $manufacturer_id,
            $shipping,
            $price,
            $cost,
            $points,
            $tax_class_id,
            $this->dateTimeFactory->makeDateTimeImmutable($date_available),
            $this->dateTimeFactory->makeDateTimeImmutable($date_added),
            $this->dateTimeFactory->makeDateTimeImmutable($date_modified),
            $weight,
            $weight_class_id,
            $length,
            $width,
            $height,
            $length_class_id,
            $sort_order,
            $status,
            $viewed
        );
    }

    /**
     * @param Product $product
     * @return array<string, mixed>
     */
    public function extract(Product $product): array {
        return [
            'product_id'      => $product->getProductId(),
            'model'           => $product->getSku(), // model
            'sku'             => $product->getSku(),
            'upc'             => $product->getUpc(),
            'ean'             => $product->getEan(),
            'jan'             => $product->getJan(),
            'isbn'            => $product->getIsbn(),
            'mpn'             => $product->getMpn(),
            'location'        => $product->getLocation(),
            'quantity'        => $product->getQuantity(),
            'stock_status_id' => $product->getStockStatusId(),
            'image'           => $product->getImage(),
            'manufacturer_id' => $product->getManufacturerId(),
            'shipping'        => $product->isShipping(),
            'price'           => $product->getPrice(),
            'cost'            => $product->getCost(),
            'points'          => $product->getPoints(),
            'tax_class_id'    => $product->getTaxClassId(),
            'date_available'  => $product->getDateAvailable(),
            'weight'          => $product->getWeight(),
            'weight_class_id' => $product->getWeightClassId(),
            'length'          => $product->getLength(),
            'width'           => $product->getWidth(),
            'height'          => $product->getHeight(),
            'length_class_id' => $product->getLengthClassId(),
            'subtract'        => $product->isSubtract(),
            'minimum'         => $product->getMinimum(),
            'sort_order'      => $product->getSortOrder(),
            'status'          => $product->isStatus(),
            'viewed'          => $product->getViewed(),
            'date_added'      => $product->getDateAdded(),
            'date_modified'   => $product->getDateModified()
        ];
    }
}
