<?php

declare(strict_types=1);

namespace RealtimeChat;

use Google\Protobuf\Internal\Message;

class Client
{
    protected $client;

    public function __construct(array $config)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $config['api_url'],
            'headers' => [
                // 'accept' => 'application/json',
                $config['service_token_header_name'] => $config['service_token']
            ]
        ]);
    }

    protected function makeRequest(Message $message, string $service, string $method)
	{
		$body = $message->serializeToString();

        $response = $this->client->post($service . '/' . $method, [
            'body' => $body
        ]);

		return (string)$response->getBody();
	}
}