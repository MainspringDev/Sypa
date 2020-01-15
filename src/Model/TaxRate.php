<?php

declare(strict_types=1);

namespace Sypa\Model;

class TaxRate {
    /**
     * @var int
     */
    private int $tax_rate_id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var float
     */
    private float $rate;
    /**
     * @var string
     */
    private string $type;
    /**
     * @var int
     */
    private int $priority;

    /**
     * @param int $tax_rate_id
     * @param string $name
     * @param float $rate
     * @param string $type
     * @param int $priority
     */
    public function __construct(int $tax_rate_id, string $name, float $rate, string $type, int $priority) {
        $this->tax_rate_id = $tax_rate_id;
        $this->name = $name;
        $this->rate = $rate;
        $this->type = $type;
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getTaxRateId(): int {
        return $this->tax_rate_id;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getRate(): float {
        return $this->rate;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }
}
