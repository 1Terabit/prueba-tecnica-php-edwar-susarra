<?php

namespace App\Exceptions;

class UserDoesNotExistException extends \Exception {
    protected $message = 'User does not exist.';
}
