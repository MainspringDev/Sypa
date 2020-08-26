<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class Recurring {
    private int $recurring_id;
    private float $price;
    private $frequency;
    private int $duration;
    private int $cycle;
    private $trial_status;
    private float $trial_price;
    private $trial_frequency;
    private int $trial_duration;
    private int $trial_cycle;
    private $status;
    private int $sort_order;

    public function __construct(
        int $recurring_id,
        float $price,
        $frequency,
        int $duration,
        int $cycle,
        $trial_status,
        float $trial_price,
        $trial_frequency,
        int $trial_duration,
        int $trial_cycle,
        $status,
        int $sort_order
    ) {
        $this->recurring_id = $recurring_id;
        $this->price = $price;
        $this->frequency = $frequency;
        $this->duration = $duration;
        $this->cycle = $cycle;
        $this->trial_status = $trial_status;
        $this->trial_price = $trial_price;
        $this->trial_frequency = $trial_frequency;
        $this->trial_duration = $trial_duration;
        $this->trial_cycle = $trial_cycle;
        $this->status = $status;
        $this->sort_order = $sort_order;
    }

    public function getRecurringId(): int {
        return $this->recurring_id;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getFrequency() {
        return $this->frequency;
    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function getCycle(): int {
        return $this->cycle;
    }

    public function getTrialStatus() {
        return $this->trial_status;
    }

    public function getTrialPrice(): float {
        return $this->trial_price;
    }

    public function getTrialFrequency() {
        return $this->trial_frequency;
    }

    public function getTrialDuration(): int {
        return $this->trial_duration;
    }

    public function getTrialCycle(): int {
        return $this->trial_cycle;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getSortOrder(): int {
        return $this->sort_order;
    }
}
