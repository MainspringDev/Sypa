<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

class UserGroup {
    private int $user_group_id;
    private string $name;
    private string $permission;

    public function __construct(int $user_group_id, string $name, string $permission) {
        $this->user_group_id = $user_group_id;
        $this->name = $name;
        $this->permission = $permission;
    }

    public function getUserGroupId(): int {
        return $this->user_group_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPermission(): string {
        return $this->permission;
    }
}
