<?php

declare(strict_types=1);

namespace Sypa\Model\Design;

class BannerImage {
    private int $banner_image_id;
    private int $banner_id;
    private int $language_id;
    private string $title;
    private string $link;
    private string $image;
    private int $sort_order;

    public function __construct(
        int $banner_image_id,
        int $banner_id,
        int $language_id,
        string $title,
        string $link,
        string $image,
        int $sort_order
    ) {
        $this->banner_image_id = $banner_image_id;
        $this->banner_id = $banner_id;
        $this->language_id = $language_id;
        $this->title = $title;
        $this->link = $link;
        $this->image = $image;
        $this->sort_order = $sort_order;
    }

    public function getBannerImageId(): int {
        return $this->banner_image_id;
    }

    public function getBannerId(): int {
        return $this->banner_id;
    }

    public function getLanguageId(): int {
        return $this->language_id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getLink(): string {
        return $this->link;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
