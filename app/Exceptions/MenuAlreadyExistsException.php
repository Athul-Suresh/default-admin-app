<?php

namespace App\Exceptions;

use Exception;

class MenuAlreadyExistsException extends Exception
{
    protected $message = 'Menu already exists';

}
