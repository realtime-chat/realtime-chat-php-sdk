<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateDirectMessageRequest;
use RealtimeChat\Rpc\CreateDirectMessageResponse;
use RealtimeChat\Rpc\DeleteDirectMessageByIdRequest;
use RealtimeChat\Rpc\DeleteDirectMessageByIdResponse;
use RealtimeChat\Rpc\FindDirectMessageByIdRequest;
use RealtimeChat\Rpc\FindDirectMessageByIdResponse;
use RealtimeChat\Rpc\Models\DirectMessage;
use RealtimeChat\Rpc\UpdateDirectMessageByIdRequest;
use RealtimeChat\Rpc\UpdateDirectMessageByIdResponse;
use RealtimeChat\Rpc\DirectMessageServiceInterface;

class DirectMessageClient extends Client implements DirectMessageServiceInterface
{
	protected $route = 'directMessages';

	public function findById(FindDirectMessageByIdRequest $request): DirectMessage
	{
		$response = new FindDirectMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function create(CreateDirectMessageRequest $request): DirectMessage
	{
		$response = new CreateDirectMessageResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function updateById(UpdateDirectMessageByIdRequest $request): DirectMessage
	{
		$response = new UpdateDirectMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function deleteById(DeleteDirectMessageByIdRequest $request): bool
	{
		$response = new DeleteDirectMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		$this->handleError($response->getStatus());

		return true;
	}
}