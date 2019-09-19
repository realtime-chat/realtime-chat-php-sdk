<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateChannelRequest;
use RealtimeChat\Rpc\CreateChannelResponse;
use RealtimeChat\Rpc\DeleteChannelByIdRequest;
use RealtimeChat\Rpc\DeleteChannelByIdResponse;
use RealtimeChat\Rpc\FindChannelByIdRequest;
use RealtimeChat\Rpc\FindChannelByIdResponse;
use RealtimeChat\Rpc\Models\Channel;
use RealtimeChat\Rpc\UpdateChannelByIdRequest;
use RealtimeChat\Rpc\UpdateChannelByIdResponse;
use RealtimeChat\Rpc\ChannelServiceInterface;
use RealtimeChat\Rpc\GetChannelParticipantIdsRequest;
use RealtimeChat\Rpc\GetChannelParticipantIdsResponse;

class ChannelClient extends Client implements ChannelServiceInterface
{
	protected $route = 'channels';

	public function findById(FindChannelByIdRequest $request): Channel
	{
		$response = new FindChannelByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function create(CreateChannelRequest $request): Channel
	{
		$response = new CreateChannelResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function updateById(UpdateChannelByIdRequest $request): Channel
	{
		$response = new UpdateChannelByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function deleteById(DeleteChannelByIdRequest $request): bool
	{
		$response = new DeleteChannelByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		$this->handleError($response->getStatus());

		return true;
	}

	public function getParticipantIds(GetChannelParticipantIdsRequest $request): array
	{
		$response = new GetChannelParticipantIdsResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'getParticipantIds'));

		$this->handleError($response->getStatus());

		$data = [];
		array_push($data, ...$response->getData());

		return $data;
	}
}