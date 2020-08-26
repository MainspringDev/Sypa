<?php

declare(strict_types=1);

namespace Sypa\Model\Setting;

class ExtensionCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Extension>
     */
    private array $extensions = [];

    public function addExtension(Extension $extension): void {
        $this->extensions[] = $extension;
    }

    public function current(): ?Extension {
        $current = current($this->extensions);

        return ($current instanceof Extension ? $current : null);
    }

    public function next(): void {
        next($this->extensions);
    }

    public function key(): ?int {
        return key($this->extensions);
    }

    public function valid(): bool {
        return (key($this->extensions) !== null);
    }

    public function rewind(): void {
        reset($this->extensions);
    }

    public function count(): int {
        return count($this->extensions);
    }
}
