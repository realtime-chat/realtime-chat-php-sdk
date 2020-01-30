<?php

declare(strict_types=1);

namespace RealtimeChat\Request;

class SendPushNotificationRequest
{
    private $userId;
    private $title;
    private $body;

    public function __construct(
        string $userId,
        string $title,
        string $body
    ) {
        $this->userId = $userId;
        $this->title = $title;
        $this->body = $body;
    }

    public function getUserId(): string
    {
        return $this->userId;
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