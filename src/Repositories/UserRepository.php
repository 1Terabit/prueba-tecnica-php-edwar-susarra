<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Entities\User;
use App\Exceptions\UserDoesNotExistException;

class UserRepository implements UserRepositoryInterface {
    private $users = [];

    public function save(User $user) {
        $this->users[$user->getId()] = $user;
    }

    public function update(User $user) {
        if (isset($this->users[$user->getId()])) {
            $this->users[$user->getId()] = $user;
        } else {
            throw new UserDoesNotExistException();
        }
    }

    public function delete($id) {
        if (!isset($this->users[$id])) {
            throw new UserDoesNotExistException();
        }
        unset($this->users[$id]);
    }

    public function findById($id) {
        return isset($this->users[$id]) ? $this->users[$id] : null;
    }

    public function findByIdOrFail($id) {
        if (!isset($this->users[$id])) {
            throw new UserDoesNotExistException();
        }
        return $this->users[$id];
    }

    public function findOrFailById($id) {
        if (!isset($this->users[$id])) {
            throw new UserDoesNotExistException();
        }
        return $this->users[$id];
    }

    public function findAll() {
        return array_values($this->users);
    }
}
