<?php

declare(strict_types=1);

namespace Sypa\Model\Marketing;

class Coupon {
    private int $coupon_id;
    private string $name;
    private string $code;
    private $type;
    private float $discount;
    private bool $logged;
    private bool $shipping;
    private float $total;
    private \DateTimeImmutable $date_start;
    private \DateTimeImmutable $date_end;
    private int $uses_total;
    private string $uses_customer;
    private bool $status;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $coupon_id,
        string $name,
        string $code,
        $type,
        float $discount,
        bool $logged,
        bool $shipping,
        float $total,
        \DateTimeImmutable $date_start,
        \DateTimeImmutable $date_end,
        int $uses_total,
        string $uses_customer,
        bool $status,
        \DateTimeImmutable $date_added
    ) {
        $this->coupon_id = $coupon_id;
        $this->name = $name;
        $this->code = $code;
        $this->type = $type;
        $this->discount = $discount;
        $this->logged = $logged;
        $this->shipping = $shipping;
        $this->total = $total;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
        $this->uses_total = $uses_total;
        $this->uses_customer = $uses_customer;
        $this->status = $status;
        $this->date_added = $date_added;
    }

    public function getCouponId(): int {
        return $this->coupon_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getType() {
        return $this->type;
    }

    public function getDiscount(): float {
        return $this->discount;
    }

    public function isLogged(): bool {
        return $this->logged;
    }

    public function isShipping(): bool {
        return $this->shipping;
    }

    public function getTotal(): float {
        return $this->total;
    }

    public function getDateStart(): \DateTimeImmutable {
        return $this->date_start;
    }

    public function getDateEnd(): \DateTimeImmutable {
        return $this->date_end;
    }

    public function getUsesTotal(): int {
        return $this->uses_total;
    }

    public function getUsesCustomer(): string {
        return $this->uses_customer;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
