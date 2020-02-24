<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Request\SendMulticastPushNotificationRequest;
use RealtimeChat\Request\SendPushNotificationRequest;

class PushNotificationClient extends HTTPClient
{
    protected $route = 'pushNotifications';

    public function send(SendPushNotificationRequest $request): bool
    {
        $response = $this->client->post($this->route . '/send', [
            \GuzzleHttp\RequestOptions::JSON => [
                'userId' => $request->getUserId(),
                'title' => $request->getTitle(),
                'body' => $request->getBody()
            ]
        ]);

        $content = (string)$response->getBody();

        return !empty($content);
    }

    public function sendMulticast(SendMulticastPushNotificationRequest $request): bool
    {
        $response = $this->client->post($this->route . '/send', [
            \GuzzleHttp\RequestOptions::JSON => [
                'userIds' => $request->getUserIds(),
                'title' => $request->getTitle(),
                'body' => $request->getBody()
            ]
        ]);

        $content = (string)$response->getBody();

        return !empty($content);
    }
}
