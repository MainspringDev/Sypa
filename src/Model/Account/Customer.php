<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class Customer {
    private int $customer_id;
    private int $customer_group_id;
    private string $language;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $telephone;
    private string $mobile;
    private string $fax;
    private string $password;
    private bool $newsletter;
    private string $ip;
    private bool $active;
    private bool $approved;

    public function __construct(
        int $customer_id,
        int $customer_group_id,
        string $language,
        string $first_name,
        string $last_name,
        string $email,
        string $telephone,
        string $mobile,
        string $fax,
        string $password,
        bool $newsletter,
        string $ip,
        bool $active,
        bool $approved
    ) {
        $this->customer_id = $customer_id;
        $this->customer_group_id = $customer_group_id;
        $this->language = $language;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->mobile = $mobile;
        $this->fax = $fax;
        $this->password = $password;
        $this->newsletter = $newsletter;
        $this->ip = $ip;
        $this->active = $active;
        $this->approved = $approved;
    }

    public function getCustomerId(): int {
        return $this->customer_id;
    }

    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    public function getLanguage(): string {
        return $this->language;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getTelephone(): string {
        return $this->telephone;
    }

    public function getMobile(): string {
        return $this->mobile;
    }

    public function getFax(): string {
        return $this->fax;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function isNewsletter(): bool {
        return $this->newsletter;
    }

    public function isActive(): bool {
        return $this->active;
    }

    public function isApproved(): bool {
        return $this->approved;
    }
}
