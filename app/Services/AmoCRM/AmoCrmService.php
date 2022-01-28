<?php

namespace App\Services\AmoCRM;

use League\OAuth2\Client\Token\AccessTokenInterface;
use AmoCRM\Client\AmoCRMApiClient;

class AmoCrmService
{
	private AmoCRMApiClient $client;

	public function __construct()
	{
		$amoCrmAuth = new AmoCrmAuth();

		$this->client = $amoCrmAuth->getClient();

		$this->client->setAccessToken($amoCrmAuth->getToken());
		$this->client->onAccessTokenRefresh(function (AccessTokenInterface $accessToken) use ($amoCrmAuth) {
			$amoCrmAuth->saveToken($accessToken);
		});
	}

	public function getClient(): AmoCRMApiClient
	{
		return $this->client;
	}
}
