<?php

namespace App\Entities;

class User {
    private $id;
    private $name;
    private $email;

    public function __construct($id, $name, $email) {
        if (!$id) {
            throw new \Exception('El usuario no existe');
        }
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
