<?php

namespace App\Http\Controllers;

use App\Services\AmoCRM\AmoCrmService;
use App\Models\FilledForm;

class AmoCrmController extends Controller
{
	public function test()
	{
		$filledForm = FilledForm::find(1);
		$amocrm = new AmoCrmService();
		$amocrm->saveForm($filledForm);
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
