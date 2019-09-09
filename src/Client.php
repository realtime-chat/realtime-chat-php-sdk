<?php

declare(strict_types=1);

namespace RealtimeChat;

use Google\Protobuf\Internal\Message;
use RealtimeChat\Exception\AlreadyExistsException;
use RealtimeChat\Exception\InvalidArgumentException;
use RealtimeChat\Exception\ModelNotFoundException;
use RealtimeChat\Exception\PermissionDeniedException;
use RealtimeChat\Exception\UnauthenticatedException;
use RealtimeChat\Exception\UnknownException;
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
			case Code::NOT_FOUND:
				throw new ModelNotFoundException($status->getMessage(), $status->getCode());
			case Code::UNAUTHENTICATED:
				throw new UnauthenticatedException($status->getMessage(), $status->getCode());
			case Code::PERMISSION_DENIED:
				throw new PermissionDeniedException($status->getMessage(), $status->getCode());
			case Code::UNKNOWN:
				throw new UnknownException($status->getMessage(), $status->getCode());
			case Code::ALREADY_EXISTS:
				throw new AlreadyExistsException($status->getMessage(), $status->getCode());
			case Code::INVALID_ARGUMENT:
				throw new InvalidArgumentException($status->getMessage(), $status->getCode());
			case Code::INTERNAL:
			case Code::UNAVAILABLE:
			case Code::CANCELLED:
			case Code::DEADLINE_EXCEEDED:
			case Code::RESOURCE_EXHAUSTED:
			case Code::FAILED_PRECONDITION:
			case Code::ABORTED:
			case Code::OUT_OF_RANGE:
			case Code::UNIMPLEMENTED:
			case Code::DATA_LOSS:
				throw new \Exception($status->getMessage(), $status->getCode());
		}
	}
}