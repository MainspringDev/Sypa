<?php

declare(strict_types=1);

namespace Sypa\Model;

class CategoryDescription {
    /**
     * @var int
     */
    private int $category_id;
    /**
     * @var int
     */
    private int $language_id;
    /**
     * @var string
     */
    private string $description;
    /**
     * @var string
     */
    private string $meta_title;
    /**
     * @var string
     */
    private string $meta_description;
    /**
     * @var string
     */
    private string $meta_keyword;
}
