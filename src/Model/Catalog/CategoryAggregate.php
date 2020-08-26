<?php

declare(strict_types=1);

namespace Sypa\Model\Catalog;

class CategoryAggregate {
    private Category $category;
    private CategoryDescription $categoryDescription;
    private CategoryFilter $categoryFilter;
    private CategoryLayout $categoryLayout;
    private CategoryPath $categoryPath;
    private CategoryStore $categoryStore;

    public function __construct(
        Category $category,
        CategoryDescription $categoryDescription,
        CategoryFilter $categoryFilter,
        CategoryLayout $categoryLayout,
        CategoryPath $categoryPath,
        CategoryStore $categoryStore
    ) {
        $this->category = $category;
        $this->categoryDescription = $categoryDescription;
        $this->categoryFilter = $categoryFilter;
        $this->categoryLayout = $categoryLayout;
        $this->categoryPath = $categoryPath;
        $this->categoryStore = $categoryStore;
    }

    public function getCategory(): Category {
        return $this->category;
    }

    public function getCategoryDescription(): CategoryDescription {
        return $this->categoryDescription;
    }

    public function getCategoryFilter(): CategoryFilter {
        return $this->categoryFilter;
    }

    public function getCategoryLayout(): CategoryLayout {
        return $this->categoryLayout;
    }

    public function getCategoryPath(): CategoryPath {
        return $this->categoryPath;
    }

    public function getCategoryStore(): CategoryStore {
        return $this->categoryStore;
    }
}
