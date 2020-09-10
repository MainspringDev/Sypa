<?php

declare(strict_types=1);

namespace Sypa\Model\Design;

class BannerAggregate {
    private Banner $banner;
    private BannerImage $bannerImage;

    public function __construct(Banner $banner, BannerImage $bannerImage) {
        $this->banner = $banner;
        $this->bannerImage = $bannerImage;
    }

    public function getBanner(): Banner {
        return $this->banner;
    }

    public function getBannerImage(): BannerImage {
        return $this->bannerImage;
    }
}
