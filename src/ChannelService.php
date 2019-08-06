<?php

declare(strict_types=1);

namespace RealtimeChat\Api;

class ChannelService extends Service
{
    protected $route = 'channels';

    public function find(array $options)
    {
        $response = $this->client->get($this->route, [
            'query' => $options
        ]);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }

    public function findById(int $id)
    {
        $response = $this->client->get($this->route . '/' . $id);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }

    public function deleteById(int $id)
    {
        $this->client->delete($this->route . '/' . $id);
    }

    public function updateById(int $id, array $data)
    {
        $response = $this->client->post($this->route . '/' . $id, [
            'json' => $data
        ]);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }

    public function create($data)
    {
        $response = $this->client->post($this->route, [
            'json' => $data
        ]);
        $content = json_decode((string)$response->getBody(), true);

        return $content['data'];
    }
}