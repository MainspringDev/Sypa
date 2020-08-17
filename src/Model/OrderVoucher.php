<?php

declare(strict_types=1);

namespace Sypa\Model;

class OrderVoucher {
    private int $order_voucher_id;
    private int $order_id;
    private int $voucher_id;
    private string $description;
    private string $code;
    private string $from_name;
    private string $from_email;
    private string $to_name;
    private string $to_email;
    private int $voucher_theme_id;
    private string $message;
    private float $amount;

    public function __construct(
        int $order_voucher_id,
        int $order_id,
        int $voucher_id,
        string $description,
        string $code,
        string $from_name,
        string $from_email,
        string $to_name,
        string $to_email,
        int $voucher_theme_id,
        string $message,
        float $amount
    ) {
        $this->order_voucher_id = $order_voucher_id;
        $this->order_id = $order_id;
        $this->voucher_id = $voucher_id;
        $this->description = $description;
        $this->code = $code;
        $this->from_name = $from_name;
        $this->from_email = $from_email;
        $this->to_name = $to_name;
        $this->to_email = $to_email;
        $this->voucher_theme_id = $voucher_theme_id;
        $this->message = $message;
        $this->amount = $amount;
    }

    public function getOrderVoucherId(): int {
        return $this->order_voucher_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getVoucherId(): int {
        return $this->voucher_id;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getFromName(): string {
        return $this->from_name;
    }

    public function getFromEmail(): string {
        return $this->from_email;
    }

    public function getToName(): string {
        return $this->to_name;
    }

    public function getToEmail(): string {
        return $this->to_email;
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
}
