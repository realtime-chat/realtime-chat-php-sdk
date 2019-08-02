<?php

declare(strict_types=1);

namespace RealtimeChat\Api\Exception;

use DomainException;

class ModelNotFoundException extends DomainException
{
    protected $message = 'Model not found.';
}