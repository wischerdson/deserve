<?php

namespace App\Http\Controllers;

use App\Services\AmoCRM\AmoCRMService;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;
use AmoCRM\Models\LeadModel;

class AmoCrmController extends Controller
{
	public function setAuthCode(string $code)
	{
		$amocrmService = new AmoCRMService();
		$amocrmService->issueToken($code);

		return 'Ok';
	}

	public function pipelines()
	{
		$amocrmService = new AmoCRMService();
		$amocrmClient = $amocrmService->getClient();
		$pipelinesService = $amocrmClient->pipelines();

		dump($pipelinesService->get());

		return;
	}

	public function createLead()
	{
		$amocrmService = new AmoCRMService();
		$amocrmClient = $amocrmService->getClient();
		$leadsService = $amocrmClient->leads();

		$lead = new LeadModel();
		$leadCustomFieldsValues = new CustomFieldsValuesCollection();
		$textCustomFieldValueModel = new TextCustomFieldValuesModel();
		$textCustomFieldValueModel->setFieldId(3);
		$textCustomFieldValueModel->setName('Vladpidor');
		$textCustomFieldValueModel->setSort(20);
		$textCustomFieldValueModel->setCode('MYSUPERCHECKBOX100');
		$textCustomFieldValueModel->setValues(
			(new TextCustomFieldValueCollection())
				->add((new TextCustomFieldValueModel())->setValue('Текст'))
		);
		$leadCustomFieldsValues->add($textCustomFieldValueModel);
		$lead->setCustomFieldsValues($leadCustomFieldsValues);
		$lead->setName('Example');

		try {
			$lead = $leadsService->addOne($lead);
		} catch (AmoCRMApiException $th) {
			dump($th);
		}
	}
}
