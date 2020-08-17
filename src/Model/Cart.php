<?php

declare(strict_types=1);

namespace Sypa\Model;

class Cart {
    private int $cart_id;
    private int $api_id;
    private int $customer_id;
    private string $session_id;
    private int $product_id;
    private int $recurring_id;
    private string $option;
    private int $quantity;
    private \DateTimeImmutable $date_added;

    public function __construct(
        int $cart_id,
        int $api_id,
        int $customer_id,
        string $session_id,
        int $product_id,
        int $recurring_id,
        string $option,
        int $quantity,
        \DateTimeImmutable $date_added
    ) {
        $this->cart_id = $cart_id;
        $this->api_id = $api_id;
        $this->customer_id = $customer_id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->recurring_id = $recurring_id;
        $this->option = $option;
        $this->quantity = $quantity;
        $this->date_added = $date_added;
    }

    public function getCartId(): int {
        return $this->cart_id;
    }

    public function getApiId(): int {
        return $this->api_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getSessionId(): string {
        return $this->session_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getRecurringId(): int {
        return $this->recurring_id;
    }

    public function getOption(): string {
        return $this->option;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }
}
