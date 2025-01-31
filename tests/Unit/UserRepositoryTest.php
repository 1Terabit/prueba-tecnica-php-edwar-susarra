<?php

use PHPUnit\Framework\TestCase;
use App\Entities\User;
use App\Repositories\UserRepository;
use App\Exceptions\UserDoesNotExistException;

class UserRepositoryTest extends TestCase {
    private $userRepository;

    protected function setUp(): void {
        $this->userRepository = new UserRepository();
    }

    public function testSaveAndFindUser() {
        $user = new User(1, 'Edwar Susarra', 'es@example.com');
        $this->userRepository->save($user);
        $foundUser = $this->userRepository->findById(1);
        $this->assertEquals($user->getName(), $foundUser->getName());
        $this->assertEquals($user->getEmail(), $foundUser->getEmail());
    }

    public function testUpdateUser() {
        $user = new User(1, 'Edwar Susarra', 'es@example.com');
        $this->userRepository->save($user);
        $user->setName('Iñigo Ardanza');
        $this->userRepository->update($user);
        $updatedUser = $this->userRepository->findById(1);
        $this->assertEquals('Iñigo Ardanza', $updatedUser->getName());
    }

    public function testDeleteUser() {
        $user = new User(1, 'Edwar Susarra', 'es@example.com');
        $this->userRepository->save($user);
        $this->userRepository->delete(1);
        $this->assertNull($this->userRepository->findById(1));
    }

    public function testFindUserByIdNotFound() {
        $this->expectException(UserDoesNotExistException::class);
        $this->userRepository->findByIdOrFail(999);
    }

    public function testUpdateUserNotFound() {
        $this->expectException(UserDoesNotExistException::class);
        $user = new User(999, 'Edwar Susarra', 'es@example.com');
        $this->userRepository->update($user);
    }

    public function testDeleteUserNotFound() {
        $this->expectException(UserDoesNotExistException::class);
        $this->userRepository->delete(999);
    }

    public function testFindAllUsers() {
        $user1 = new User(1, 'Edwar Susarra', 'es@example.com');
        $user2 = new User(2, 'Iñigo Ardanza', 'ia@example.com');
        $this->userRepository->save($user1);
        $this->userRepository->save($user2);
        $users = $this->userRepository->findAll();
        $this->assertCount(2, $users);
        $this->assertEquals($user1->getName(), $users[0]->getName());
        $this->assertEquals($user2->getName(), $users[1]->getName());
    }
}
