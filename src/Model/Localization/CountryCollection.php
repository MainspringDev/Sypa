<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class CountryCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Country>
     */
    private array $countries = [];

    public function addCountry(Country $country): void {
        $this->countries[$country->getCountryId()] = $country;
    }

    public function hasCountry(string $country_id): bool {
        return array_key_exists($country_id, $this->countries);
    }

    public function getCountry(string $country_id): Country {
        if ($this->hasCountry($country_id) === false) {
            // @todo exception
            throw new \Exception();
        }

        return $this->countries[$country_id];
    }

    public function current(): ?Country {
        $current = current($this->countries);

        return ($current instanceof Country ? $current : null);
    }

    public function next(): void {
        next($this->countries);
    }

    public function key(): ?string {
        return key($this->countries);
    }

    public function valid(): bool {
        return (key($this->countries) !== null);
    }

    public function rewind(): void {
        reset($this->countries);
    }

    public function count(): int {
        return count($this->countries);
    }
}
