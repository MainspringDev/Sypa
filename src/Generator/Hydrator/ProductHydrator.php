<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Product;

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

    public function hydrate(array $data): Product {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create product from data. Missing '%s'.",
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
            $date_available,
            $date_added,
            $date_modified,
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
}
