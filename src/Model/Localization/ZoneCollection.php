<?php

declare(strict_types=1);

namespace Sypa\Model\Localization;

class ZoneCollection {
    /**
     * @var array<int, Zone>
     */
    private array $zones = [];

    public function addZone(Zone $zone): void {
        $this->zones[$zone->getZoneId()] = $zone;
    }

    public function hasZone(string $zone_id): bool {
        return array_key_exists($zone_id, $this->zones);
    }

    public function getZone(string $zone_id): Zone {
        if ($this->hasZone($zone_id) === false) {
            // @todo exception
            throw new \Exception();
        }

        return $this->zones[$zone_id];
    }

    public function current(): ?Zone {
        $current = current($this->zones);

        return ($current instanceof Zone ? $current : null);
    }

    public function next(): void {
        next($this->zones);
    }

    public function key(): ?string {
        return key($this->zones);
    }

    public function valid(): bool {
        return (key($this->zones) !== null);
    }

    public function rewind(): void {
        reset($this->zones);
    }

    public function count(): int {
        return count($this->zones);
    }
}
