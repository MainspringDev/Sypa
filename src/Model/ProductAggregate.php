<?php

declare(strict_types=1);

namespace Sypa\Model;

class ProductAggregate {
    private Product $product;
    private ProductAttribute $productAttribute;
    private ProductDescription $productDescription;
    private ProductDiscount $productDiscount;
    private ProductFilter $productFilter;
    private ProductImage $productImage;
    private ProductOption $productOption;
    private ProductRelated $productRelated;
    private ProductReward $productReward;
    private ProductSpecial $productSpecial;
}
