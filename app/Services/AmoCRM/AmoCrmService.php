<?php

namespace App\Services\AmoCRM;

use League\OAuth2\Client\Token\AccessTokenInterface;
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Helpers\EntityTypesInterface;
use AmoCRM\Models\LeadModel;
use AmoCRM\Models\Unsorted\FormsMetadata;
use AmoCRM\Models\Unsorted\FormUnsortedModel;
use App\Models\FilledForm;
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

	public function createLead(FilledForm $filledForm): void
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
		$lead->setName('Форма "'.$form->name.'"');
		$lead->setCreatedBy(0);
		$lead->setResponsibleUserId(config('services.amocrm.responsible_user_id'));

		$formMetadata = new FormsMetadata();
		$formMetadata->setFormId($filledForm->id);
		$formMetadata->setFormName($form->name);
		$formMetadata->setFormPage(config('services.amocrm.redirect_uri'));

		$formUnsorted = new FormUnsortedModel();
		$formUnsorted->setSourceName($form->name);
		$formUnsorted->setSourceUid($form->id);
		$formUnsorted->setLead($lead);
		$formUnsorted->setMetadata($formMetadata);
		$formUnsorted->setPipelineId($form->amocrm_pipeline_id);

		try {
			$service = $this->client->unsorted();
			$service->addOne($formUnsorted);
		} catch (AmoCRMApiException $e) {
			dump($e);
			\Log::error($e);
		}
	}
}
