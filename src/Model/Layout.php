<?php

namespace Sypa\Model;

class Layout {
    private int $layout_id;
    private string $name;

    public function __construct(int $layout_id, string $name) {
        $this->layout_id = $layout_id;
        $this->name = $name;
    }

    public function getLayoutId(): int {
        return $this->layout_id;
    }

    public function getName(): string {
        return $this->name;
    }
}
