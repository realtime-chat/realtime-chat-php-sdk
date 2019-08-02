<?php

declare(strict_types=1);

namespace RealtimeChat\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\BadResponseException;
use RealtimeChat\Api\Exception\ValidationErrorException;
use RealtimeChat\Api\Exception\ModelNotFoundException;
use RealtimeChat\Api\Exception\ServerErrorException;
use RealtimeChat\Api\Exception\ServiceUnavailableException;
use RealtimeChat\Api\Exception\UnknownErrorException;

class UserService extends Service
{
    protected $route = 'users';

    public function find(array $options): array
    {
        try {
            $response = $this->client->get($this->route, [
                'query' => $options
            ]);
            $content = json_decode((string)$response->getBody(), true);
    
            return $content['data'];
        } catch (BadResponseException $e) {
            $content = json_decode((string)$e->getResponse()->getBody(), true);

            switch ($e->getResponse()->getStatusCode()) {
                case 400:
                    throw new ValidationErrorException($content['error']);
                case 404:
                    throw new ModelNotFoundException($content['error']);
                case 500:
                    throw new ServerErrorException($content['error']);
                case 502:
                case 503:
                    throw new ServiceUnavailableException();
                default:
                    throw new UnknownErrorException($e->getMessage());
            }
        }
    }

    public function findOne(array $options): ?array
    {
        try {
            $response = $this->client->get($this->route, [
                'query' => array_merge($options, [
                    'limit' => 1
                ])
            ]);
            $content = json_decode((string)$response->getBody(), true);
    
            return count($content['data']) === 1
                ? $content['data'][0]
                : null;
        } catch (BadResponseException $e) {
            $content = json_decode((string)$e->getResponse()->getBody(), true);

            switch ($e->getResponse()->getStatusCode()) {
                case 400:
                    throw new ValidationErrorException($content['error']);
                case 404:
                    throw new ModelNotFoundException($content['error']);
                case 500:
                    throw new ServerErrorException($content['error']);
                case 502:
                case 503:
                    throw new ServiceUnavailableException();
                default:
                    throw new UnknownErrorException($e->getMessage());
            }
        }
    }

    public function findById(int $id): ?array
    {
        try {
            $response = $this->client->get($this->route . '/' . $id);
            $content = json_decode((string)$response->getBody(), true);

            return $content['data'];
        } catch (BadResponseException $e) {
            $content = json_decode((string)$e->getResponse()->getBody(), true);

            switch ($e->getResponse()->getStatusCode()) {
                case 400:
                    throw new ValidationErrorException($content['error']);
                case 404:
                    return null;
                case 500:
                    throw new ServerErrorException($content['error']);
                case 502:
                case 503:
                    throw new ServiceUnavailableException();
                default:
                    throw new UnknownErrorException($e->getMessage());
            }
        }
    }

    public function deleteById(int $id): void
    {
        try {
            $this->client->delete($this->route . '/' . $id);
        } catch (BadResponseException $e) {
            $content = json_decode((string)$e->getResponse()->getBody(), true);

            switch ($e->getResponse()->getStatusCode()) {
                case 400:
                    throw new ValidationErrorException($content['error']);
                case 404:
                    throw new ModelNotFoundException($content['error']);
                case 500:
                    throw new ServerErrorException($content['error']);
                case 502:
                case 503:
                    throw new ServiceUnavailableException();
                default:
                    throw new UnknownErrorException($e->getMessage());
            }
        }
    }

    public function updateById(int $id, array $data): array
    {
        try {
            $response = $this->client->post($this->route . '/' . $id, [
                'json' => $data
            ]);
            $content = json_decode((string)$response->getBody(), true);

            return $content['data'];
        } catch (BadResponseException $e) {
            $content = json_decode((string)$e->getResponse()->getBody(), true);

            switch ($e->getResponse()->getStatusCode()) {
                case 400:
                    throw new ValidationErrorException($content['error']);
                case 404:
                    throw new ModelNotFoundException($content['error']);
                case 500:
                    throw new ServerErrorException($content['error']);
                case 502:
                case 503:
                    throw new ServiceUnavailableException();
                default:
                    throw new UnknownErrorException($e->getMessage());
            }
        }
    }

    public function create(array $data): array
    {
        try {
            $response = $this->client->post($this->route, [
                'json' => $data
            ]);
            $content = json_decode((string)$response->getBody(), true);
dd((string)$response->getBody());
            return $content['data'];
        } catch (BadResponseException $e) {
            $content = json_decode((string)$e->getResponse()->getBody(), true);

            switch ($e->getResponse()->getStatusCode()) {
                case 400:
                    throw new ValidationErrorException($content['error']);
                case 404:
                    throw new ModelNotFoundException($content['error']);
                case 500:
                    throw new ServerErrorException($content['error']);
                case 502:
                case 503:
                    throw new ServiceUnavailableException();
                default:
                    throw new UnknownErrorException($e->getMessage());
            }
        }
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
