<?php

declare(strict_types=1);

namespace RealtimeChat\Api\Exception;

use DomainException;

class UnknownErrorException extends DomainException
{
    protected $message = 'Unknown error.';
}