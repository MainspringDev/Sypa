<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Design\Banner;

class BannerHydrator {
    const REQUIRED_DATA = [
        'banner_id',
        'name',
        'status'
    ];

    public function hydrate(array $data): Banner {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create banner from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'banner_id' => $banner_id,
            'name'      => $name,
            'status'    => $status
        ) = $data;

        return new Banner($banner_id, $name, $status);
    }

    /**
     * @param Banner $banner
     * @return array<string, mixed>
     */
    public function extract(Banner $banner): array {
        return [
            'banner_id' => $banner->getBannerId(),
            'name'      => $banner->getName(),
            'status'    => $banner->isStatus()
        ];
    }
}
