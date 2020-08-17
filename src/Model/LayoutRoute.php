<?php

declare(strict_types=1);

namespace Sypa\Model;

class LayoutRoute {
    private int $layout_route_id;
    private int $layout_id;
    private int $store_id;
    private string $route;

    public function __construct(int $layout_route_id, int $layout_id, int $store_id, string $route) {
        $this->layout_route_id = $layout_route_id;
        $this->layout_id = $layout_id;
        $this->store_id = $store_id;
        $this->route = $route;
    }

    public function getLayoutRouteId(): int {
        return $this->layout_route_id;
    }

    public function getLayoutId(): int {
        return $this->layout_id;
    }

    public function getStoreId(): int {
        return $this->store_id;
    }

    public function getRoute(): string {
        return $this->route;
    }
}
