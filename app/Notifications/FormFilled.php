<?php

namespace App\Notifications;

use App\Models\FilledForm;
use App\Models\FormAnswer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class FormFilled extends Notification implements ShouldQueue
{
	use Queueable;

	private FilledForm $filledForm;

	public function __construct(FilledForm $filledForm)
	{
		$this->filledForm = $filledForm;
	}

	public function via()
	{
		return [ 'telegram' ];
	}

	public function toTelegram($notifiable)
	{
		$form = $this->filledForm->form;
		$answers = $this->filledForm->answers;

		$answers->loadMissing('formField');

		$message = $answers->reduce(function ($result = '', FormAnswer $answer) {
			$field = $answer->formField;

			$result .= "\n{$field->name}: *{$answer->answer}*";

			return $result;
		});

		return TelegramMessage::create()
            ->to($notifiable->routes['telegram'])
            ->content("💰💰💰  НОВАЯ ЗАЯВКА  🍆🍑🍭\n\nФорма \"*{$form->name}*\"\n\n${message}\n\n");
	}
}
