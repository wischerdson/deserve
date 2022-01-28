<?php

namespace App\Services\AmoCRM;

use League\OAuth2\Client\Token\AccessTokenInterface;
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Helpers\EntityTypesInterface;
use AmoCRM\Models\CustomFields\TextCustomFieldModel;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;
use AmoCRM\Models\LeadModel;
use App\Models\FormField;
use Throwable;

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

	public function setCustomField(?FormField $field = null): void
	{
		// $customFieldsService = $this->client->customFields(EntityTypesInterface::LEADS);

		// $cf = new TextCustomFieldModel();
		// $cf->setName('пидрбаба');
		// $cf->setCode('PIDRBABA');

		$leadsService = $this->client->leads();

		$lead = new LeadModel();
		$values = new AmoCrmFields([ 'PIDRBABA' => 'Владос гей' ]);

		$lead->setCustomFieldsValues($values->generate());
		$lead->setPipelineId(5091382);
		$lead->setName('Владоса продырявили в другой воронке');


		try {
			$lead = $leadsService->addOne($lead);
		} catch (AmoCRMApiException $e) {
			dd($e);
			die;
		}
	}
}
