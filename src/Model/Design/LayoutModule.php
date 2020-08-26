<?php

namespace Sypa\Model\Design;

class LayoutModule {
    private int $layout_module_id;
    private int $layout_id;
    private string $code;
    private string $position;
    private int $sort_order;

    public function __construct(
        int $layout_module_id,
        int $layout_id,
        string $code,
        string $position,
        int $sort_order
    ) {
        $this->layout_module_id = $layout_module_id;
        $this->layout_id = $layout_id;
        $this->code = $code;
        $this->position = $position;
        $this->sort_order = $sort_order;
    }

    public function getLayoutModuleId(): int {
        return $this->layout_module_id;
    }

    public function getLayoutId(): int {
        return $this->layout_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getPosition(): string {
        return $this->position;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
