<?php

declare(strict_types=1);

namespace Sypa\Model;

class CategoryPath {
    private int $category_id;
    private int $path_id;
    private int $level;

    public function __construct(int $category_id, int $path_id, int $level) {
        $this->category_id = $category_id;
        $this->path_id = $path_id;
        $this->level = $level;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    public function getPathId(): int {
        return $this->path_id;
    }

    public function getLevel(): int {
        return $this->level;
    }
}
