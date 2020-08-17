<?php

declare(strict_types=1);

namespace Sypa\Model;

class CustomerCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Customer>
     */
    private array $customers = [];

    public function addCustomer(Customer $customer): void {
        $this->customers[] = $customer;
    }

    public function current(): ?Customer {
        $current = current($this->customers);

        return ($current instanceof Customer ? $current : null);
    }

    public function next(): void {
        next($this->customers);
    }

    public function key(): ?int {
        return key($this->customers);
    }

    public function valid(): bool {
        return (key($this->customers) !== null);
    }

    public function rewind(): void {
        reset($this->customers);
    }

    public function count(): int {
        return count($this->customers);
    }
}
