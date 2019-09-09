<?php

declare(strict_types=1);

namespace RealtimeChat\Exception;

use DomainException;

class NotFoundException extends DomainException
{
    protected $message = 'Model not found.';
}