<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

use Sypa\Exception\ResourceNotFoundException;

class TaxRateCollection implements \Iterator, \Countable {
    /**
     * @var array<int, TaxRate>
     */
    private array $tax_rates = [];

    public function addTaxRate(TaxRate $taxRate): void {
        $this->tax_rates[$taxRate->getTaxRateId()] = $taxRate;
    }

    public function hasTaxRate(int $id): bool {
        return array_key_exists($id, $this->tax_rates);
    }

    /**
     * @param int $id
     * @return TaxRate
     * @throws ResourceNotFoundException
     */
    public function getTaxRate(int $id): TaxRate {
        if ($this->hasTaxRate($id) === false) {
            throw new ResourceNotFoundException();
        }

        return $this->tax_rates[$id];
    }

    public function current(): ?TaxRate {
        $current = current($this->tax_rates);

        return ($current instanceof TaxRate ? $current : null);
    }

    public function next(): void {
        next($this->tax_rates);
    }

    public function key(): ?int {
        return key($this->tax_rates);
    }

    public function valid(): bool {
        return (key($this->tax_rates) !== null);
    }

    public function rewind(): void {
        reset($this->tax_rates);
    }

    public function count(): int {
        return count($this->tax_rates);
    }
}
