<?php

namespace App\Http\Controllers;

use App\Services\AmoCRM\AmoCrmService;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;
use AmoCRM\Models\LeadModel;

class AmoCrmController extends Controller
{
	public function test()
	{
		$amocrm = new AmoCrmService();
		$amocrm->setCustomField();
	}

	public function pipelines()
	{
		$amocrmService = new AmoCrmService();
		$amocrmClient = $amocrmService->getClient();
		$pipelinesService = $amocrmClient->pipelines();

		dump($pipelinesService->get());

		return;
	}

	public function createLead()
	{

	}
}
