<?php

declare(strict_types=1);

namespace Sypa\Model;

class User {
    /**
     * @var int
     */
    private $user_id;
    /**
     * @var int
     */
    private $user_group_id;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
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
    private $image;
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $ip;
    /**
     * @var bool
     */
    private $status;
    /**
     * @var \DateTimeInterface
     */
    private $date_added;
    /**
     * @var \DateTimeInterface
     */
    private $date_modified;

    /**
     * @param int $user_id
     * @param int $user_group_id
     * @param string $username
     * @param string $password
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $image
     * @param string $code
     * @param string $ip
     * @param bool $status
     * @param \DateTimeInterface $date_added
     * @param \DateTimeInterface $date_modified
     */
    public function __construct(
        int $user_id,
        int $user_group_id,
        string $username,
        string $password,
        string $first_name,
        string $last_name,
        string $email,
        string $image,
        string $code,
        string $ip,
        bool $status,
        \DateTimeInterface $date_added,
        \DateTimeInterface $date_modified
    ) {
        $this->user_id = $user_id;
        $this->user_group_id = $user_group_id;
        $this->username = $username;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->image = $image;
        $this->code = $code;
        $this->ip = $ip;
        $this->status = $status;
        $this->date_added = $date_added;
        $this->date_modified = $date_modified;
    }

    /**
     * @return int
     */
    public function getUserId(): int {
        return $this->user_id;
    }

    /**
     * @return int
     */
    public function getUserGroupId(): int {
        return $this->user_group_id;
    }

    /**
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
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
    public function getImage(): string {
        return $this->image;
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
    public function getIp(): string {
        return $this->ip;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateAdded(): \DateTimeInterface {
        return $this->date_added;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateModified(): \DateTimeInterface {
        return $this->date_modified;
    }
}
