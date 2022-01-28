<?php

namespace App\Services\AmoCRM;

use League\OAuth2\Client\Token\AccessToken;
use AmoCRM\Client\AmoCRMApiClient;
use Illuminate\Support\Facades\Cache;
use App\Services\AmoCRM\Exceptions\MissingAccessTokenException;

class AmoCrmAuth
{
	const CACHE_KEY = 'amocrm_access_token';

	private AmoCRMApiClient $client;

	public function __construct()
	{
		$clientId = config('services.amocrm.client_id');
		$clientSecret = config('services.amocrm.client_secret');
		$redirectUri = config('services.amocrm.redirect_uri');
		$baseDomain = config('services.amocrm.base_domain');

		$this->client = new AmoCRMApiClient($clientId, $clientSecret, $redirectUri);
		$this->client->setAccountBaseDomain($baseDomain);
	}

	public function exchangeCodeForToken(string $code): AccessToken
	{
		return $this->client->getOAuthClient()->getAccessTokenByCode($code);
	}

	public function saveToken(AccessToken $token): void
	{
		Cache::forget(self::CACHE_KEY);

		if (!$token->hasExpired()) {
			Cache::forever(self::CACHE_KEY, [
				'access_token' => $token->getToken(),
				'refresh_token' => $token->getRefreshToken(),
				'expires' => $token->getExpires(),
				'base_domain' => config('services.amocrm.base_domain')
			]);
		}
	}

	/**
	 * @throws \App\Services\AmoCRM\Exceptions\MissingAccessTokenException
	 */
	public function getToken(): AccessToken
	{
		if ($this->missingToken()) {
			throw new MissingAccessTokenException();
		}

		return new AccessToken(Cache::get(self::CACHE_KEY));
	}

	public function missingToken(): bool
	{
		return Cache::missing(self::CACHE_KEY);
	}

	public function getClient(): AmoCRMApiClient
	{
		return $this->client;
	}
}
