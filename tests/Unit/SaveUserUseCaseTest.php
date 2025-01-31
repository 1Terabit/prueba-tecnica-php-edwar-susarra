<?php

use PHPUnit\Framework\TestCase;
use App\DTOs\UserDTO;
use App\Interfaces\UserRepositoryInterface;
use App\UseCases\SaveUserUseCase;
use App\Exceptions\UserDoesNotExistException;
use App\Exceptions\InvalidUserException;

class SaveUserUseCaseTest extends TestCase {
    public function testExecute() {
        $userRepository = $this->createMock(UserRepositoryInterface::class);
        $userRepository->expects($this->once())
            ->method('save');

        $useCase = new SaveUserUseCase($userRepository);
        $userDTO = new UserDTO('Edwar Susarra', 'es@example.com', 'password123');
        $useCase->execute($userDTO);
    }

    public function testExecuteWithInvalidUser() {
        $this->expectException(UserDoesNotExistException::class);

        $userRepository = $this->createMock(UserRepositoryInterface::class);
        $userRepository->expects($this->once())
            ->method('save')
            ->will($this->throwException(new UserDoesNotExistException()));

        $useCase = new SaveUserUseCase($userRepository);
        $userDTO = new UserDTO('', 'invalid-email', '');
        $useCase->execute($userDTO);
    }

    public function testExecuteWithInvalidUserData() {
        $this->expectException(InvalidUserException::class);

        $userRepository = $this->createMock(UserRepositoryInterface::class);
        $userRepository->expects($this->once())
            ->method('save')
            ->will($this->throwException(new InvalidUserException()));

        $useCase = new SaveUserUseCase($userRepository);
        $userDTO = new UserDTO('', 'invalid-email', '');
        $useCase->execute($userDTO);
    }
}
