<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Design\BannerImage;

class BannerImageHydrator {
    const REQUIRED_DATA = [
        'banner_image_id',
        'banner_id',
        'language_id',
        'title',
        'link',
        'image',
        'sort_order',
        'status'
    ];

    public function hydrate(array $data): BannerImage {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create banner from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'banner_image_id' => $banner_image_id,
            'banner_id'       => $banner_id,
            'language_id'     => $language_id,
            'title'           => $title,
            'link'            => $link,
            'image'           => $image,
            'sort_order'      => $sort_order,
            'status'          => $status
        ) = $data;

        return new BannerImage(
            $banner_image_id,
            $banner_id,
            $language_id,
            $title,
            $link,
            $image,
            $sort_order,
            $status
        );
    }

    /**
     * @param BannerImage $bannerImage
     * @return array<string, mixed>
     */
    public function extract(BannerImage $bannerImage): array {
        return [
            'banner_image_id' => $bannerImage->getBannerImageId(),
            'banner_id'       => $bannerImage->getBannerId(),
            'language_id'     => $bannerImage->getLanguageId(),
            'title'           => $bannerImage->getTitle(),
            'link'            => $bannerImage->getLink(),
            'image'           => $bannerImage->getImage(),
            'sort_order'      => $bannerImage->getSortOrder(),
            'status'          => $bannerImage->isStatus()
        ];
    }
}
