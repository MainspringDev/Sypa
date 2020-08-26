<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class OrderRecurringTransaction {
    private int $order_recurring_transaction_id;
    private int $order_recurring_id;
    private string $reference;
    private int $type;
    private float $amount;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $order_recurring_transaction_id,
        int $order_recurring_id,
        string $reference,
        int $type,
        float $amount,
        \DateTimeImmutable $date_added
    ) {
        $this->order_recurring_transaction_id = $order_recurring_transaction_id;
        $this->order_recurring_id = $order_recurring_id;
        $this->reference = $reference;
        $this->type = $type;
        $this->amount = $amount;
        $this->date_added = $date_added;
    }

    public function getOrderRecurringTransactionId(): int {
        return $this->order_recurring_transaction_id;
    }

    public function getOrderRecurringId(): int {
        return $this->order_recurring_id;
    }

    public function getReference(): string {
        return $this->reference;
    }

    public function getType(): int {
        return $this->type;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
