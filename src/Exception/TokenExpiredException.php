<?php

declare(strict_types=1);

namespace RealtimeChat\Exception;

use DomainException;

class TokenExpiredException extends DomainException
{
    protected $message = 'Access token expired.';
}