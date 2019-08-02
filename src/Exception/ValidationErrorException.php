<?php

declare(strict_types=1);

namespace RealtimeChat\Api\Exception;

use DomainException;

class ValidationErrorException extends DomainException
{
    protected $message = 'Validation error.';
}