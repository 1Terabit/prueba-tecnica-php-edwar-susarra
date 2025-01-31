<?php

namespace App\UseCases;

use App\Interfaces\UserRepositoryInterface;
use App\DTOs\UserDTO;
use App\Entities\User;

class SaveUserUseCase {
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute(UserDTO $userDTO) {
        $user = new User(uniqid(), $userDTO->name, $userDTO->email);
        $this->userRepository->save($user);
    }
}
