<?php

declare(strict_types=1);

namespace RealtimeChat\Exception;

use DomainException;

class UnknownException extends DomainException
{
    protected $message = 'Unknown error.';
}