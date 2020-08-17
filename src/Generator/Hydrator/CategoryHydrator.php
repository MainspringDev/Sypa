<?php

namespace Sypa\Generator\Hydrator;

use Sypa\Exception\MalformedResourceException;
use Sypa\Generator\Factory\DateTimeFactory;
use Sypa\Model\Category;

class CategoryHydrator {
    const REQUIRED_DATA = [
        'category_id',
        'image',
        'parent_id',
        'top',
        'column',
        'sort_order',
        'status',
        'date_added',
        'date_modified'
    ];
    private DateTimeFactory $dateTimeFactory;

    public function __construct(DateTimeFactory $dateTimeFactory) {
        $this->dateTimeFactory = $dateTimeFactory;
    }

    /**
     * @param array $data
     * @return Category
     * @throws MalformedResourceException
     */
    public function hydrate(array $data): Category {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create category from array data. Missing index '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'category_id'   => $category_id,
            'image'         => $image,
            'parent_id'     => $parent_id,
            'top'           => $top,
            'column'        => $column,
            'sort_order'    => $sort_order,
            'status'        => $status,
            'date_added'    => $date_added,
            'date_modified' => $date_modified
        ) = $data;

        try {
            return new Category(
                $category_id,
                $image,
                $parent_id,
                $top,
                $column,
                $sort_order,
                $status,
                $this->dateTimeFactory->makeDateTimeImmutable($date_added),
                $this->dateTimeFactory->makeDateTimeImmutable($date_modified)
            );
        } catch (\Exception $e) {
            throw new MalformedResourceException("Resource 'category' is malformed.", 0, $e);
        }
    }

    /**
     * @param Category $category
     * @return array<string, mixed>
     */
    public function extract(Category $category): array {
        return [
            'category_id'   => $category->getCategoryId(),
            'image'         => $category->getImage(),
            'parent_id'     => $category->getParentId(),
            'top'           => $category->isTop(),
            'column'        => $category->getColumn(),
            'sort_order'    => $category->getSortOrder(),
            'status'        => $category->isStatus(),
            'date_added'    => $category->getDateAdded(),
            'date_modified' => $category->getDateModified()
        ];
    }
}
