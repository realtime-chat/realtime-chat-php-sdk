<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateDirectMessageRequest;
use RealtimeChat\Rpc\CreateDirectMessageResponse;
use RealtimeChat\Rpc\DeleteDirectMessageByIdRequest;
use RealtimeChat\Rpc\DeleteDirectMessageByIdResponse;
use RealtimeChat\Rpc\FindDirectMessageByIdRequest;
use RealtimeChat\Rpc\FindDirectMessageByIdResponse;
use RealtimeChat\Rpc\UpdateDirectMessageByIdRequest;
use RealtimeChat\Rpc\UpdateDirectMessageByIdResponse;
use RealtimeChat\Rpc\DirectMessageServiceInterface;

class DirectMessageClient extends Client implements DirectMessageServiceInterface
{
	protected $route = 'DirectMessages';

	public function findById(FindDirectMessageByIdRequest $request): FindDirectMessageByIdResponse
	{
		$response = new FindDirectMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		return $response;
	}

	public function create(CreateDirectMessageRequest $request): CreateDirectMessageResponse
	{
		$response = new CreateDirectMessageResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		return $response;
	}

	public function updateById(UpdateDirectMessageByIdRequest $request): UpdateDirectMessageByIdResponse
	{
		$response = new UpdateDirectMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		return $response;
	}

	public function deleteById(DeleteDirectMessageByIdRequest $request): DeleteDirectMessageByIdResponse
	{
		$response = new DeleteDirectMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		return $response;
	}
}