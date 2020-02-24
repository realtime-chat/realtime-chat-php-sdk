<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Request\SendMailRequest;

class MailClient extends HTTPClient
{
    protected $route = 'mail';

    public function send(SendMailRequest $request): bool
    {
        $response = $this->client->post($this->route . '/send', [
            \GuzzleHttp\RequestOptions::JSON => [
                'to' => $request->getTo(),
                'subject' => $request->getSubject(),
                'text' => $request->getText()
            ]
        ]);

        return $response->getStatusCode() === 204;
    }
}
