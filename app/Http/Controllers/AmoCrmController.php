<?php

namespace App\Http\Controllers;

use AmoCRM\Exceptions\AmoCRMApiException;
use App\Services\AmoCRM\AmoCrmService;

class AmoCrmController extends Controller
{
	public function pipelines()
	{
		$amocrmService = new AmoCrmService();
		$amocrmClient = $amocrmService->getClient();
		$pipelinesService = $amocrmClient->pipelines();

		try {
			dump($pipelinesService->get());
		} catch (AmoCRMApiException $e) {
			dd($e);
		}

		return;
	}
}
