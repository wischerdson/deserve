<?php

namespace App\Http\Controllers;

use AmoCRM\Exceptions\AmoCRMApiException;
use App\Models\FilledForm;
use App\Services\AmoCRM\AmoCrmService;

class AmoCrmController extends Controller
{
	public function __construct()
	{
		if (!config('app.debug')) {
			abort(404);
		}
	}

	public function pipelines(AmoCrmService $crm)
	{
		$client = $crm->getClient();
		$pipelines = $client->pipelines();

		try {
			dd($pipelines->get());
		} catch (AmoCRMApiException $e) {
			dd($e);
		}
	}

	public function users(AmoCrmService $crm)
	{
		$client = $crm->getClient();
		$users = $client->users();

		try {
			dd($users->get());
		} catch (AmoCRMApiException $e) {
			dd($e);
		}
	}
}
