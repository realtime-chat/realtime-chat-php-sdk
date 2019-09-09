<?php

declare(strict_types=1);

namespace RealtimeChat\Exception;

use DomainException;

class PermissionDeniedException extends DomainException
{
    protected $message = 'Permission denied.';
}