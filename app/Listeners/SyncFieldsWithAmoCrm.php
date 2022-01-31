<?php

namespace App\Listeners;

use App\Events\FieldCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncFieldsWithAmoCrm implements ShouldQueue
{
	/**
	 * Handle the event.
	 *
	 * @param  object  $event
	 * @return void
	 */
	public function handle(FieldCreated $event)
	{
		//
	}
}
