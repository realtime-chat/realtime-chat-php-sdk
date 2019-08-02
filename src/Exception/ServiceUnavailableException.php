<?php

declare(strict_types=1);

namespace RealtimeChat\Api\Exception;

use DomainException;

class ServiceUnavailableException extends DomainException
{
    protected $message = 'Service unavailable.';
}