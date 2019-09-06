<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateChannelMessageRequest;
use RealtimeChat\Rpc\CreateChannelMessageResponse;
use RealtimeChat\Rpc\DeleteChannelMessageByIdRequest;
use RealtimeChat\Rpc\DeleteChannelMessageByIdResponse;
use RealtimeChat\Rpc\FindChannelMessageByIdRequest;
use RealtimeChat\Rpc\FindChannelMessageByIdResponse;
use RealtimeChat\Rpc\UpdateChannelMessageByIdRequest;
use RealtimeChat\Rpc\UpdateChannelMessageByIdResponse;
use RealtimeChat\Rpc\ChannelMessageServiceInterface;

class ChannelMessageClient extends Client implements ChannelMessageServiceInterface
{
	protected $route = 'ChannelMessages';

	public function findById(FindChannelMessageByIdRequest $request): FindChannelMessageByIdResponse
	{
		$response = new FindChannelMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		return $response;
	}

	public function create(CreateChannelMessageRequest $request): CreateChannelMessageResponse
	{
		$response = new CreateChannelMessageResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		return $response;
	}

	public function updateById(UpdateChannelMessageByIdRequest $request): UpdateChannelMessageByIdResponse
	{
		$response = new UpdateChannelMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		return $response;
	}

	public function deleteById(DeleteChannelMessageByIdRequest $request): DeleteChannelMessageByIdResponse
	{
		$response = new DeleteChannelMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		return $response;
	}
}