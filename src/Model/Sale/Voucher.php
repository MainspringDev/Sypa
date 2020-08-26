<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class Voucher {
    private int $voucher_id;
    private int $order_id;
    private string $code;
    private string $from_name;
    private string $to_name;
    private int $voucher_theme_id;
    private string $message;
    private float $amount;
    private bool $status;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $voucher_id,
        int $order_id,
        string $code,
        string $from_name,
        string $to_name,
        int $voucher_theme_id,
        string $message,
        float $amount, bool $status, \DateTimeImmutable $date_added) {
        $this->voucher_id = $voucher_id;
        $this->order_id = $order_id;
        $this->code = $code;
        $this->from_name = $from_name;
        $this->to_name = $to_name;
        $this->voucher_theme_id = $voucher_theme_id;
        $this->message = $message;
        $this->amount = $amount;
        $this->status = $status;
        $this->date_added = $date_added;
    }

    public function getVoucherId(): int {
        return $this->voucher_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getFromName(): string {
        return $this->from_name;
    }

    public function getToName(): string {
        return $this->to_name;
    }

    public function getVoucherThemeId(): int {
        return $this->voucher_theme_id;
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function isStatus(): bool {
        return $this->status;
    }
}
