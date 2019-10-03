<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateWorkspaceRequest;
use RealtimeChat\Rpc\CreateWorkspaceResponse;
use RealtimeChat\Rpc\DeleteWorkspaceByIdRequest;
use RealtimeChat\Rpc\DeleteWorkspaceByIdResponse;
use RealtimeChat\Rpc\FindWorkspaceByIdRequest;
use RealtimeChat\Rpc\FindWorkspaceByIdResponse;
use RealtimeChat\Rpc\Models\Workspace;
use RealtimeChat\Rpc\UpdateWorkspaceByIdRequest;
use RealtimeChat\Rpc\UpdateWorkspaceByIdResponse;
use RealtimeChat\Rpc\GetWorkspaceParticipantIdsRequest;
use RealtimeChat\Rpc\GetWorkspaceParticipantIdsResponse;
use RealtimeChat\Rpc\WorkspaceServiceInterface;

class WorkspaceClient extends Client implements WorkspaceServiceInterface
{
	protected $route = 'workspaces';

	public function findById(FindWorkspaceByIdRequest $request): Workspace
	{
		$response = new FindWorkspaceByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function create(CreateWorkspaceRequest $request): Workspace
	{
		$response = new CreateWorkspaceResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function updateById(UpdateWorkspaceByIdRequest $request): Workspace
	{
		$response = new UpdateWorkspaceByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}

	public function deleteById(DeleteWorkspaceByIdRequest $request): bool
	{
		$response = new DeleteWorkspaceByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		$this->handleError($response->getStatus());

		return true;
	}

	public function getParticipantIds(GetWorkspaceParticipantIdsRequest $request): array
	{
		$response = new GetWorkspaceParticipantIdsResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'getParticipantIds'));

		$this->handleError($response->getStatus());

		$data = [];
		array_push($data, ...$response->getData());

		return $data;
	}
}