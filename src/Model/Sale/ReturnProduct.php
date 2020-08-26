<?php

declare(strict_types=1);

namespace Sypa\Model\Sale;

class ReturnProduct {
    private int $return_id;
    private int $order_id;
    private int $product_id;
    private int $customer_id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $telephone;
    private string $product;
    private string $model;
    private int $quantity;
    private bool $opened;
    private int $return_reason_id;
    private int $return_action_id;
    private int $return_status_id;
    private string $comment;
    private \DateTimeImmutable $date_ordered;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

    public function __construct(
        int $return_id,
        int $order_id,
        int $product_id,
        int $customer_id,
        string $firstname,
        string $lastname,
        string $email,
        string $telephone,
        string $product,
        string $model,
        int $quantity,
        bool $opened,
        int $return_reason_id,
        int $return_action_id,
        int $return_status_id,
        string $comment,
        \DateTimeImmutable $date_ordered,
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
    ) {
        $this->return_id = $return_id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->customer_id = $customer_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->product = $product;
        $this->model = $model;
        $this->quantity = $quantity;
        $this->opened = $opened;
        $this->return_reason_id = $return_reason_id;
        $this->return_action_id = $return_action_id;
        $this->return_status_id = $return_status_id;
        $this->comment = $comment;
        $this->date_ordered = $date_ordered;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    public function getReturnId(): int {
        return $this->return_id;
    }

    public function getOrderId(): int {
        return $this->order_id;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getTelephone(): string {
        return $this->telephone;
    }

    public function getProduct(): string {
        return $this->product;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function isOpened(): bool {
        return $this->opened;
    }

    public function getReturnReasonId(): int {
        return $this->return_reason_id;
    }

    public function getReturnActionId(): int {
        return $this->return_action_id;
    }

    public function getReturnStatusId(): int {
        return $this->return_status_id;
    }

    public function getComment(): string {
        return $this->comment;
    }

    public function getDateOrdered(): \DateTimeImmutable {
        return $this->date_ordered;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
