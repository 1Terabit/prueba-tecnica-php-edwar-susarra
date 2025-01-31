<?php

namespace App\Interfaces;

interface UserRepositoryInterface {
    public function save(
        \App\Entities\User $user
    );
    public function update(
        \App\Entities\User $user
    );
    public function delete($id);
    public function findById($id);
    public function findByIdOrFail($id);
    public function findOrFailById($id);
}
