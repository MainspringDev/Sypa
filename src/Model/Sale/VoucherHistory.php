<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class VoucherHistory {
    private int $voucher_history_id;
    private int $voucher_id;
    private int $order_id;
    private float $amount;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $voucher_history_id,
        int $voucher_id,
        int $order_id,
        float $amount,
        \DateTimeImmutable $date_added
    ) {
        $this->voucher_history_id = $voucher_history_id;
        $this->voucher_id = $voucher_id;
        $this->order_id = $order_id;
        $this->amount = $amount;
        $this->date_added = $date_added;
    }

    public function getVoucherHistoryId(): int {
        return $this->voucher_history_id;
    }

    public function getVoucherId(): int {
        return $this->voucher_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
