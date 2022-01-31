<?php

namespace App\Listeners;

use App\Events\FormFilled;
use App\Services\AmoCRM\AmoCrmService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAmoCrmLead implements ShouldQueue
{
	/**
	 * Handle the event.
	 *
	 * @param  object  $event
	 * @return void
	 */
	public function handle(FormFilled $event)
	{
		$filledForm = $event->filledForm;
		$amocrmService = new AmoCrmService();
		$amocrmService->createLead($filledForm);
	}
}
