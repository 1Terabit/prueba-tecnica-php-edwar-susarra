<?php
use PHPUnit\Framework\TestCase;
use App\Entities\User;
use App\Repositories\UserRepository;

class UserTest extends TestCase {
    public function testUserCreation() {
        $user = new User(1, 'Edwar Susarra', 'es@example.com');
        $this->assertEquals('Edwar Susarra', $user->getName());
        $this->assertEquals('es@example.com', $user->getEmail());
    }

    public function testUserUpdate() {
        $user = new User(1, 'Edwar Susarra', 'es@example.com');
        $user->setName('Iñigo Ardanza');
        $user->setEmail('ia@example.com');
        $this->assertEquals('Iñigo Ardanza', $user->getName());
        $this->assertEquals('ia@example.com', $user->getEmail());
    }
}
