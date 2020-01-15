<?php

declare(strict_types=1);

namespace Sypa\Model;

class CurrencyCollection implements \Iterator, \Countable {
    /**
     * @var Currency[]
     */
    private array $currencies = [];

    public function addCurrency(Currency $currency): void {
        $this->currencies[$currency->getCode()] = $currency;
    }

    public function hasCurrency(string $code): bool {
        return array_key_exists($code, $this->currencies);
    }

    public function getCurrency(string $code): Currency {
        if ($this->hasCurrency($code) === false) {
            // @todo exception
            throw new \Exception();
        }

        return $this->currencies[$code];
    }

    public function current(): ?Currency {
        $current = current($this->currencies);

        return ($current instanceof Currency ? $current : null);
    }

    public function next(): void {
        next($this->currencies);
    }

    public function key(): ?string {
        return key($this->currencies);
    }

    public function valid(): bool {
        return (key($this->currencies) !== null);
    }

    public function rewind(): void {
        reset($this->currencies);
    }

    public function count(): int {
        return count($this->currencies);
    }
}
