<?php

declare(strict_types=1);

namespace RealtimeChat\Api\Exception;

use DomainException;

class ServerErrorException extends DomainException
{
    protected $message = 'Server error.';
}