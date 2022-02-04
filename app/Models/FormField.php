<?php

namespace App\Models;

use App\Events\FieldCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $table = 'form_fields';

	public static function boot() {
		parent::boot();

		static::created(function($item) {
			FieldCreated::dispatch($item);
		});
	}
}
