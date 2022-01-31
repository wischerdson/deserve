<?php

namespace App\Events;

use App\Models\FormField;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FieldCreated
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public FormField $field;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(FormField $field)
	{
		$this->field = $field;
	}
}
