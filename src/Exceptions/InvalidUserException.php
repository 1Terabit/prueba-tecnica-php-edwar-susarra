<?php

namespace App\Exceptions;

class InvalidUserException extends \Exception {
    protected $message = 'Invalid user data provided.';
}
