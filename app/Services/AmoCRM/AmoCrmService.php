<?php

namespace App\Services\AmoCRM;

use League\OAuth2\Client\Token\AccessTokenInterface;
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Helpers\EntityTypesInterface;
use AmoCRM\Models\LeadModel;
use App\Models\FilledForm;
use App\Services\AmoCRM\Exceptions\FormDoesntHasPipelineIdException;
use App\Services\AmoCRM\Exceptions\FormDoesntHavePipelineIdException;

class AmoCrmService
{
	private AmoCRMApiClient $client;

	private AmoCrmAuth $auth;

	public function __construct()
	{
		$this->auth = new AmoCrmAuth();

		$this->client = $this->auth->getClient();

		$this->client->setAccessToken($this->auth->getToken());
		$this->client->onAccessTokenRefresh(function (AccessTokenInterface $accessToken) {
			$this->auth->saveToken($accessToken);
		});
	}

	public function getClient(): AmoCRMApiClient
	{
		return $this->client;
	}

	public function saveForm(FilledForm $filledForm): void
	{
		$form = $filledForm->form;

		if (is_null($form->amocrm_pipeline_id)) {
			throw new FormDoesntHavePipelineIdException();
		}

		$fields = $filledForm->formFields;

		$service = $this->client->customFields(EntityTypesInterface::LEADS);

		$amocrmFields = new AmoCrmFields();
		$amocrmFields->publishFields($fields, $service);
		$values = $amocrmFields->generate($filledForm->answers);

		$lead = new LeadModel();
		$lead->setCustomFieldsValues($values);
		$lead->setPipelineId($form->amocrm_pipeline_id);
		$lead->setName('Заполнена форма на сайте');

		try {
			$leadsService = $this->client->leads();
			$lead = $leadsService->addOne($lead);
		} catch (AmoCRMApiException $e) {
			dd($e);
			die;
		}
	}
}
