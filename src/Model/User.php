<?php

declare(strict_types=1);

namespace Sypa\Model;

class User {
    private int $user_id;
    private int $user_group_id;
    private string $username;
    private string $password;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $image;
    private string $code;
    private string $ip;
    private bool $status;
    private \DateTimeImmutable $date_added;
    private \DateTimeImmutable $date_modified;

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

    public function getUserId(): int {
        return $this->user_id;
    }

    public function getUserGroupId(): int {
        return $this->user_group_id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getPassword(): string {
        return $this->password;
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

    public function getImage(): string {
        return $this->image;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getIp(): string {
        return $this->ip;
    }

    public function isStatus(): bool {
        return $this->status;
    }

    public function getDateAdded(): \DateTimeImmutable {
        return $this->date_added;
    }

    public function getDateModified(): \DateTimeImmutable {
        return $this->date_modified;
    }
}
