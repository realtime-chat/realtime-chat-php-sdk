<?php

declare(strict_types=1);

namespace RealtimeChat\Exception;

use DomainException;

class InvalidArgumentException extends DomainException
{
    protected $message = 'Invalid argument.';
}