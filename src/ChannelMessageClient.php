<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateChannelMessageRequest;
use RealtimeChat\Rpc\CreateChannelMessageResponse;
use RealtimeChat\Rpc\DeleteChannelMessageByIdRequest;
use RealtimeChat\Rpc\DeleteChannelMessageByIdResponse;
use RealtimeChat\Rpc\FindChannelMessageByIdRequest;
use RealtimeChat\Rpc\FindChannelMessageByIdResponse;
use RealtimeChat\Rpc\Models\ChannelMessage;
use RealtimeChat\Rpc\UpdateChannelMessageByIdRequest;
use RealtimeChat\Rpc\UpdateChannelMessageByIdResponse;
use RealtimeChat\Rpc\ChannelMessageServiceInterface;

class ChannelMessageClient extends Client implements ChannelMessageServiceInterface
{
	protected $route = 'channelMessages';

	public function findById(FindChannelMessageByIdRequest $request): ChannelMessage
	{
		$response = new FindChannelMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function create(CreateChannelMessageRequest $request): ChannelMessage
	{
		$response = new CreateChannelMessageResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function updateById(UpdateChannelMessageByIdRequest $request): ChannelMessage
	{
		$response = new UpdateChannelMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function deleteById(DeleteChannelMessageByIdRequest $request): bool
	{
		$response = new DeleteChannelMessageByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		$this->handleError($response->getStatus());

		return true;
	}
}