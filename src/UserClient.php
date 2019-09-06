<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\CreateUserRequest;
use RealtimeChat\Rpc\CreateUserResponse;
use RealtimeChat\Rpc\DeleteUserByIdRequest;
use RealtimeChat\Rpc\DeleteUserByIdResponse;
use RealtimeChat\Rpc\FindUserByIdRequest;
use RealtimeChat\Rpc\FindUserByIdResponse;
use RealtimeChat\Rpc\FindUserByEmailRequest;
use RealtimeChat\Rpc\FindUserByEmailResponse;
use RealtimeChat\Rpc\UpdateUserByIdRequest;
use RealtimeChat\Rpc\UpdateUserByIdResponse;
use RealtimeChat\Rpc\UserServiceInterface;
use RealtimeChat\Rpc\VerifyUserPasswordRequest;
use RealtimeChat\Rpc\VerifyUserPasswordResponse;

class UserClient extends Client implements UserServiceInterface
{
    protected $route = 'users';

    public function findById(FindUserByIdRequest $request): FindUserByIdResponse
    {
		$response = new FindUserByIdResponse();
        $response->mergeFromString($this->makeRequest($request, $this->route, 'findById'));

        return $response;
	}
	
    public function findByEmail(FindUserByEmailRequest $request): FindUserByEmailResponse
    {
		$response = new FindUserByEmailResponse();
        $response->mergeFromString($this->makeRequest($request, $this->route, 'findByEmail'));

        return $response;
    }

    public function create(CreateUserRequest $request): CreateUserResponse
    {
        $response = new CreateUserResponse();
        $response->mergeFromString($this->makeRequest($request, $this->route, 'create'));

        return $response;
    }

    public function updateById(UpdateUserByIdRequest $request): UpdateUserByIdResponse
	{
		$response = new UpdateUserByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'updateById'));

		return $response;
	}

	public function deleteById(DeleteUserByIdRequest $request): DeleteUserByIdResponse
	{
		$response = new DeleteUserByIdResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'deleteById'));

		return $response;
	}

	public function verifyPassword(VerifyUserPasswordRequest $request): VerifyUserPasswordResponse
	{
		$response = new VerifyUserPasswordResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'verifyPassword'));

		return $response;
	}
}