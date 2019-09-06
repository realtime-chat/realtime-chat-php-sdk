<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateChannelRequest;
use RealtimeChat\Rpc\CreateChannelResponse;
use RealtimeChat\Rpc\DeleteChannelByIdRequest;
use RealtimeChat\Rpc\DeleteChannelByIdResponse;
use RealtimeChat\Rpc\FindChannelByIdRequest;
use RealtimeChat\Rpc\FindChannelByIdResponse;
use RealtimeChat\Rpc\UpdateChannelByIdRequest;
use RealtimeChat\Rpc\UpdateChannelByIdResponse;
use RealtimeChat\Rpc\ChannelServiceInterface;

class ChannelClient extends Client implements ChannelServiceInterface
{
	protected $route = 'Channels';

	public function findById(FindChannelByIdRequest $request): FindChannelByIdResponse
	{
		$response = new FindChannelByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		return $response;
	}

	public function create(CreateChannelRequest $request): CreateChannelResponse
	{
		$response = new CreateChannelResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		return $response;
	}

	public function updateById(UpdateChannelByIdRequest $request): UpdateChannelByIdResponse
	{
		$response = new UpdateChannelByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		return $response;
	}

	public function deleteById(DeleteChannelByIdRequest $request): DeleteChannelByIdResponse
	{
		$response = new DeleteChannelByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		return $response;
	}
}