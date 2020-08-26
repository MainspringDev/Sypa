<?php

namespace Sypa\Model\Localization;

class LanguageCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Language>
     */
    private array $languages = [];

    public function addLanguage(Language $language): void {
        $this->languages[] = $language;
    }

    public function current(): ?Language {
        $current = current($this->languages);

        return ($current instanceof Language ? $current : null);
    }

    public function next(): void {
        next($this->languages);
    }

    public function key(): ?int {
        return key($this->languages);
    }

    public function valid(): bool {
        return (key($this->languages) !== null);
    }

    public function rewind(): void {
        reset($this->languages);
    }

    public function count(): int {
        return count($this->languages);
    }
}
