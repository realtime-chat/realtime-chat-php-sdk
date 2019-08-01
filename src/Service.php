<?php

declare(strict_types=1);

namespace RealtimeChat\Api;

class Service
{
    protected $apiUrl = 'http://127.0.0.1/';
    protected $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->apiUrl,
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }
}