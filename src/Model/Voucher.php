<?php

declare(strict_types=1);

namespace Sypa\Model;

class Voucher {
    /**
     * @var int
     */
    private $voucher_id;
    /**
     * @var int
     */
    private $order_id;
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $from_name;
    /**
     * @var string
     */
    private $to_name;
    /**
     * @var int
     */
    private $voucher_theme_id;
    /**
     * @var string
     */
    private $message;
    /**
     * @var float
     */
    private $amount;
    /**
     * @var bool
     */
    private $status;
    /**
     * @var \DateTimeImmutable
     */
    private $date_added;

    /**
     * @param int $voucher_id
     * @param int $order_id
     * @param string $code
     * @param string $from_name
     * @param string $to_name
     * @param int $voucher_theme_id
     * @param string $message
     * @param float $amount
     * @param bool $status
     * @param \DateTimeImmutable $date_added
     */
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

    /**
     * @return int
     */
    public function getVoucherId(): int {
        return $this->voucher_id;
    }

    /**
     * @return int
     */
    public function getOrderId(): int {
        return $this->order_id;
    }

    /**
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getFromName(): string {
        return $this->from_name;
    }

    /**
     * @return string
     */
    public function getToName(): string {
        return $this->to_name;
    }

    /**
     * @return int
     */
    public function getVoucherThemeId(): int {
        return $this->voucher_theme_id;
    }

    /**
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * @return float
     */
    public function getAmount(): float {
        return $this->amount;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }
}
