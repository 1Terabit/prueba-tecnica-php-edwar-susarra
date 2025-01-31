<?php

use PHPUnit\Framework\TestCase;
use App\Entities\User;
use App\Repositories\UserRepository;
use App\Exceptions\UserDoesNotExistException;

class UserRepositoryIntegrationTest extends TestCase {
    private $userRepository;

    protected function setUp(): void {
        $this->userRepository = new UserRepository();
    }

    public function testWhenUserIsNotFoundByIdErrorIsThrown() {
        $this->expectException(UserDoesNotExistException::class);
        $this->userRepository->findByIdOrFail(999);
    }
}
