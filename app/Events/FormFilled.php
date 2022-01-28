<?php

namespace App\Events;

use App\Models\FilledForm;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FormFilled
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public FilledForm $filledForm;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(FilledForm $filledForm)
	{
		$this->filledForm = $filledForm;
	}
}
