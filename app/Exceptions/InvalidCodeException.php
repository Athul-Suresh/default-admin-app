<?php

namespace App\Exceptions;

use Exception;

class InvalidCodeException extends Exception
{
    protected $message = 'Invalid code name';
}
