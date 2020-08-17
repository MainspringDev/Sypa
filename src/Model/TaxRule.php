<?php

declare(strict_types=1);

namespace Sypa\Model;

class TaxRule {
    private int $tax_rule_id;
    private int $tax_class_id;
    private int $tax_rate_id;
    private string $based;
    private int $priority;

    public function __construct(int $tax_rule_id, int $tax_class_id, int $tax_rate_id, string $based, int $priority) {
        $this->tax_rule_id = $tax_rule_id;
        $this->tax_class_id = $tax_class_id;
        $this->tax_rate_id = $tax_rate_id;
        $this->based = $based;
        $this->priority = $priority;
    }

    public function getTaxRuleId(): int {
        return $this->tax_rule_id;
    }

    public function getTaxClassId(): int {
        return $this->tax_class_id;
    }

    public function getTaxRateId(): int {
        return $this->tax_rate_id;
    }

    public function getBased(): string {
        return $this->based;
    }

    public function getPriority(): int {
        return $this->priority;
    }
}
