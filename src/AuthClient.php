<?php

declare(strict_types=1);

namespace RealtimeChat;

use RealtimeChat\Rpc\AuthServiceInterface;
use RealtimeChat\Rpc\Models\TokenPayload;
use RealtimeChat\Rpc\VerifyTokenRequest;
use RealtimeChat\Rpc\VerifyTokenResponse;

class AuthClient extends Client implements AuthServiceInterface
{
	protected $route = 'auth';

	public function verifyToken(VerifyTokenRequest $request): TokenPayload
	{
		$response = new VerifyTokenResponse();
		$response->mergeFromString($this->makeRequest($request, $this->route, 'verifyToken'));

		$this->handleError($response->getStatus());

		return $response->getData();
	}
}