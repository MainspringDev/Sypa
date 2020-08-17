<?php

declare(strict_types=1);

namespace Sypa\Model;

class OrderRecurring {
    private int $order_recurring_id;
    private int $order_id;
    private string $reference;
    private int $product_id;
    private string $product_name;
    private int $product_quantity;
    private int $recurring_id;
    private string $recurring_name;
    private string $recurring_description;
    private string $recurring_frequency;
    private int $recurring_cycle;
    private int $recurring_duration;
    private float $recurring_price;
    private bool $trial;
    private string $trial_frequency;
    private int $trial_cycle;
    private int $trial_duration;
    private float $trial_price;
    private $status;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $order_recurring_id,
        int $order_id,
        string $reference,
        int $product_id,
        string $product_name,
        int $product_quantity,
        int $recurring_id,
        string $recurring_name,
        string $recurring_description,
        string $recurring_frequency,
        int $recurring_cycle,
        int $recurring_duration,
        float $recurring_price,
        bool $trial,
        string $trial_frequency,
        int $trial_cycle,
        int $trial_duration,
        float $trial_price,
        $status,
        \DateTimeImmutable $date_added
    ) {
        $this->order_recurring_id = $order_recurring_id;
        $this->order_id = $order_id;
        $this->reference = $reference;
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_quantity = $product_quantity;
        $this->recurring_id = $recurring_id;
        $this->recurring_name = $recurring_name;
        $this->recurring_description = $recurring_description;
        $this->recurring_frequency = $recurring_frequency;
        $this->recurring_cycle = $recurring_cycle;
        $this->recurring_duration = $recurring_duration;
        $this->recurring_price = $recurring_price;
        $this->trial = $trial;
        $this->trial_frequency = $trial_frequency;
        $this->trial_cycle = $trial_cycle;
        $this->trial_duration = $trial_duration;
        $this->trial_price = $trial_price;
        $this->status = $status;
        $this->date_added = $date_added;
    }

    public function getOrderRecurringId(): int {
        return $this->order_recurring_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getReference(): string {
        return $this->reference;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getProductName(): string {
        return $this->product_name;
    }

    public function getProductQuantity(): int {
        return $this->product_quantity;
    }

    public function getRecurringId(): int {
        return $this->recurring_id;
    }

    public function getRecurringName(): string {
        return $this->recurring_name;
    }

    public function getRecurringDescription(): string {
        return $this->recurring_description;
    }

    public function getRecurringFrequency(): string {
        return $this->recurring_frequency;
    }

    public function getRecurringCycle() {
        return $this->recurring_cycle;
    }

    public function getRecurringDuration() {
        return $this->recurring_duration;
    }

    public function getRecurringPrice(): float {
        return $this->recurring_price;
    }

    public function isTrial(): bool {
        return $this->trial;
    }

    public function getTrialFrequency(): string {
        return $this->trial_frequency;
    }

    public function getTrialCycle() {
        return $this->trial_cycle;
    }

    public function getTrialDuration() {
        return $this->trial_duration;
    }

    public function getTrialPrice(): float {
        return $this->trial_price;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
