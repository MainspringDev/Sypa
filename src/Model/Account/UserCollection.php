<?php

declare(strict_types=1);

namespace Sypa\Model\Account;

use Sypa\Exception\ResourceNotFoundException;

class UserCollection {
    /**
     * @var array<int, User>
     */
    private array $users = [];

    public function addUser(User $user): void {
        $this->users[$user->getUserId()] = $user;
    }

    public function hasUser(int $user_id): bool {
        return array_key_exists($user_id, $this->users);
    }

    public function getUser(int $user_id): User {
        if ($this->hasUser($user_id) === false) {
            throw new ResourceNotFoundException();
        }

        return $this->users[$user_id];
    }

    public function current(): ?User {
        $current = current($this->users);

        return ($current instanceof User ? $current : null);
    }

    public function next(): void {
        next($this->users);
    }

    public function key(): ?int {
        return key($this->users);
    }

    public function valid(): bool {
        return (key($this->users) !== null);
    }

    public function rewind(): void {
        reset($this->users);
    }

    public function count(): int {
        return count($this->users);
    }
}
