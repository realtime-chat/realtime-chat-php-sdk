<?php

declare(strict_types=1);

namespace RealtimeChat\Request;

class SendMulticastPushNotificationRequest
{
    private $userIds;
    private $title;
    private $body;

    public function __construct(
        array $userIds,
        string $title,
        string $body
    ) {
        $this->userIds = $userIds;
        $this->title = $title;
        $this->body = $body;
    }

    public function getUserIds(): array
    {
        return $this->userIds;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}