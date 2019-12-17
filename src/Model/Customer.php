<?php

declare(strict_types=1);

namespace Sypa\Model;

class Customer {
    /**
     * @var int
     */
    private $customer_id;
    /**
     * @var int
     */
    private $customer_group_id;
    /**
     * @var string
     */
    private $language;
    /**
     * @var string
     */
    private $first_name;
    /**
     * @var string
     */
    private $last_name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $telephone;
    /**
     * @var string
     */
    private $mobile;
    /**
     * @var string
     */
    private $fax;
    /**
     * @var string
     */
    private $password;
    /**
     * @var bool
     */
    private $newsletter;
    /**
     * @var string
     */
    private $ip;
    /**
     * @var bool
     */
    private $active;
    /**
     * @var bool
     */
    private $approved;

    /**
     * @param int $customer_id
     * @param int $customer_group_id
     * @param string $language
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $telephone
     * @param string $mobile
     * @param string $fax
     * @param string $password
     * @param bool $newsletter
     * @param string $ip
     * @param bool $active
     * @param bool $approved
     */
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

    /**
     * @return int
     */
    public function getCustomerId(): int {
        return $this->customer_id;
    }

    /**
     * @return int
     */
    public function getCustomerGroupId(): int {
        return $this->customer_group_id;
    }

    /**
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getTelephone(): string {
        return $this->telephone;
    }

    /**
     * @return string
     */
    public function getMobile(): string {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getFax(): string {
        return $this->fax;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function isNewsletter(): bool {
        return $this->newsletter;
    }

    /**
     * @return string
     */
    public function getIp(): string {
        return $this->ip;
    }

    /**
     * @return bool
     */
    public function isActive(): bool {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool {
        return $this->approved;
    }
}
