<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateWorkspaceRequest;
use RealtimeChat\Rpc\CreateWorkspaceResponse;
use RealtimeChat\Rpc\DeleteWorkspaceByIdRequest;
use RealtimeChat\Rpc\DeleteWorkspaceByIdResponse;
use RealtimeChat\Rpc\FindWorkspaceByIdRequest;
use RealtimeChat\Rpc\FindWorkspaceByIdResponse;
use RealtimeChat\Rpc\UpdateWorkspaceByIdRequest;
use RealtimeChat\Rpc\UpdateWorkspaceByIdResponse;
use RealtimeChat\Rpc\WorkspaceServiceInterface;

class WorkspaceClient extends Client implements WorkspaceServiceInterface
{
	protected $route = 'workspaces';

	public function findById(FindWorkspaceByIdRequest $request): FindWorkspaceByIdResponse
	{
		$response = new FindWorkspaceByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

		return $response;
	}

	public function create(CreateWorkspaceRequest $request): CreateWorkspaceResponse
	{
		$response = new CreateWorkspaceResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

		return $response;
	}

	public function updateById(UpdateWorkspaceByIdRequest $request): UpdateWorkspaceByIdResponse
	{
		$response = new UpdateWorkspaceByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		return $response;
	}

	public function deleteById(DeleteWorkspaceByIdRequest $request): DeleteWorkspaceByIdResponse
	{
		$response = new DeleteWorkspaceByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		return $response;
	}
}