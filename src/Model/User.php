<?php

declare(strict_types=1);

namespace Sypa\Model;

class User {
    /**
     * @var int
     */
    private int $user_id;
    /**
     * @var int
     */
    private int $user_group_id;
    /**
     * @var string
     */
    private string $username;
    /**
     * @var string
     */
    private string $password;
    /**
     * @var string
     */
    private string $first_name;
    /**
     * @var string
     */
    private string $last_name;
    /**
     * @var string
     */
    private string $email;
    /**
     * @var string
     */
    private string $image;
    /**
     * @var string
     */
    private string $code;
    /**
     * @var string
     */
    private string $ip;
    /**
     * @var bool
     */
    private bool $status;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_added;
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $date_modified;

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
     * @param \DateTimeImmutable $date_added
     * @param \DateTimeImmutable $date_modified
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
        \DateTimeImmutable $date_added,
        \DateTimeImmutable $date_modified
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
     * @return \DateTimeImmutable
     */
    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
