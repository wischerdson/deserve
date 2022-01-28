<?php

namespace App\Listeners;

use App\Events\FormFilled;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAmocrmLead implements ShouldQueue
{
	/**
	 * Handle the event.
	 *
	 * @param  object  $event
	 * @return void
	 */
	public function handle(FormFilled $event)
	{
		dump($event);
	}
}
