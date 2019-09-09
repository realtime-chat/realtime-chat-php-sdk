<?php

declare(strict_types=1);

namespace RealtimeChat;

use Google\Protobuf\Internal\Message;
use RealtimeChat\Rpc\Models\Code;
use RealtimeChat\Rpc\Models\Status;

class Client
{
    protected $client;

    public function __construct(array $config)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $config['api_url'],
            'headers' => [
            	'accept' => 'application/protobuf',
                'content-type' => 'application/protobuf',
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

	protected function handleError(Status $status)
	{
		switch ($status->getCode()) {
			case Code::OK:
				break;
			case Code::CANCELLED:
			case Code::UNKNOWN:
			case Code::INVALID_ARGUMENT:
			case Code::DEADLINE_EXCEEDED:
			case Code::NOT_FOUND:
			case Code::ALREADY_EXISTS:
			case Code::PERMISSION_DENIED:
			case Code::RESOURCE_EXHAUSTED:
			case Code::FAILED_PRECONDITION:
			case Code::ABORTED:
			case Code::OUT_OF_RANGE:
			case Code::UNIMPLEMENTED:
			case Code::INTERNAL:
			case Code::UNAVAILABLE:
			case Code::DATA_LOSS:
			case Code::UNAUTHENTICATED:
				throw new \Exception($status->getMessage());
		}
	}
}