<?php

declare(strict_types=1);

namespace Sypa\Model\Report;

class Statistics {
    private int $statistics_id;
    private string $code;
    private float $value;

    public function __construct(int $statistics_id, string $code, float $value) {
        $this->statistics_id = $statistics_id;
        $this->code = $code;
        $this->value = $value;
    }

    public function getStatisticsId(): int {
        return $this->statistics_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getValue(): float {
        return $this->value;
    }
}
