<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class AddressCollection implements \Iterator, \Countable {
    /**
     * @var array<int, Address>
     */
    private array $addresses = [];

    public function addAddress(Address $address): void {
        $this->addresses[$address->getAddressId()] = $address;
    }

    public function hasAddress(string $address_id): bool {
        return array_key_exists($address_id, $this->addresses);
    }

    public function getAddress(string $address_id): Address {
        if ($this->hasAddress($address_id) === true) {
            return $this->addresses[$address_id];
        }

        // @todo exception
        throw new \Exception();
    }

    public function current(): ?Address {
        $current = current($this->addresses);

        return ($current instanceof Address ? $current : null);
    }

    public function next(): void {
        next($this->addresses);
    }

    public function key(): ?int {
        return key($this->addresses);
    }

    public function valid(): bool {
        return (key($this->addresses) !== null);
    }

    public function rewind(): void {
        reset($this->addresses);
    }

    public function count(): int {
        return count($this->addresses);
    }
}
