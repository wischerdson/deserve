<?php

namespace App\Listeners;

use App\Events\FormFilled;
use App\Notifications\FormFilled as FormFilledNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendTelegramNotification implements ShouldQueue
{
	/**
	 * Handle the event.
	 *
	 * @param  object  $event
	 * @return void
	 */
	public function handle(FormFilled $event)
	{
		Notification::route('telegram', config('services.telegram.chat_id'))
			->notify(new FormFilledNotification($event->filledForm));
	}
}
