<?php

declare(strict_types=1);

namespace RealtimeChat\Api;

use GuzzleHttp\Exception\GuzzleException;

class UserService extends Service
{
    protected $route = 'users';

    public function find(array $options): array
    {
        $response = $this->client->get($this->route, [
            'query' => $options
        ]);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }

    public function findOne(array $options): ?array
    {
        $response = $this->client->get($this->route, [
            'query' => array_merge($options, [
                'limit' => 1
            ])
        ]);
        $content = json_decode((string)$response->getBody(), true);

        return count($content['data']) === 1
            ? $content['data'][0]
            : null;
    }

    public function findById(int $id): ?array
    {
        $response = $this->client->get($this->route . '/' . $id);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }

    public function deleteById(int $id): void
    {
        $this->client->delete($this->route . '/' . $id);
    }

    public function updateById(int $id, array $data): array
    {
        $response = $this->client->post($this->route . '/' . $id, [
            'json' => $data
        ]);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }

    public function create(array $data): array
    {
        $response = $this->client->post($this->route, [
            'json' => $data
        ]);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }

    public function verifyPassword(array $data): bool
    {
        try {
            $response = $this->client->post('verify-user-password', [
                'json' => $data
            ]);

            return $response->getStatusCode() === 204;
        } catch (GuzzleException $e) {
            return false;
        }
    }
}
