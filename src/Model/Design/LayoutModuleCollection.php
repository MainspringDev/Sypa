<?php

declare(strict_types=1);

namespace Sypa\Model\Design;

class LayoutModuleCollection implements \Iterator, \Countable {
    /**
     * @var array<int, LayoutModule>
     */
    private array $layoutModules = [];

    public function addLayoutModule(LayoutModule $layoutModule): void {
        $this->layoutModules[] = $layoutModule;
    }

    public function current(): ?LayoutModule {
        $current = current($this->layoutModules);

        return ($current instanceof LayoutModule ? $current : null);
    }

    public function next(): void {
        next($this->layoutModules);
    }

    public function key(): ?int {
        return key($this->layoutModules);
    }

    public function valid(): bool {
        return (key($this->layoutModules) !== null);
    }

    public function rewind(): void {
        reset($this->layoutModules);
    }

    public function count(): int {
        return count($this->layoutModules);
    }
}
