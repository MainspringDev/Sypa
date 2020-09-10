<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Catalog\CategoryDescription;

class CategoryDescriptionHydrator {
    const REQUIRED_DATA = [
        'category_id',
        'language_id',
        'name',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];

    public function hydrate(array $data): CategoryDescription {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create category description from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'category_id'      => $category_id,
            'language_id'      => $language_id,
            'name'             => $name,
            'description'      => $description,
            'meta_title'       => $meta_title,
            'meta_description' => $meta_description,
            'meta_keyword'     => $meta_keyword
        ) = $data;

        return new CategoryDescription(
            $category_id,
            $language_id,
            $name,
            $description,
            $meta_title,
            $meta_description,
            $meta_keyword
        );
    }

    /**
     * @param CategoryDescription $categoryDescription
     * @return array<string, mixed>
     */
    public function extract(CategoryDescription $categoryDescription): array {
        return [
            'category_id'      => $categoryDescription->getCategoryid(),
            'language_id'      => $categoryDescription->getLanguageId(),
            'name'             => $categoryDescription->getName(),
            'description'      => $categoryDescription->getDescription(),
            'meta_title'       => $categoryDescription->getMetaTitle(),
            'meta_description' => $categoryDescription->getMetaDescription(),
            'meta_keyword'     => $categoryDescription->getMetaKeyword()
        ];
    }
}
