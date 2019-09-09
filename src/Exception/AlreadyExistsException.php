<?php

declare(strict_types=1);

namespace RealtimeChat\Exception;

use DomainException;

class AlreadyExistsException extends DomainException
{
    protected $message = 'Already exists.';
}