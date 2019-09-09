<?php

declare(strict_types=1);

namespace RealtimeChat\Exception;

use DomainException;

class UnauthenticatedException extends DomainException
{
    protected $message = 'Unauthenticated.';
}