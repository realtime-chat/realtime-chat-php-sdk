<?php

declare(strict_types=1);

namespace RealtimeChat;

class HTTPClient
{
    protected $client;

    public function __construct(array $config)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $config['api_url'],
            'headers' => [
            	'accept' => 'application/json',
                'content-type' => 'application/json',
                $config['service_token_header_name'] => $config['service_token']
            ]
        ]);
    }
}