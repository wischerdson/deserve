<?php

namespace App\Models;

use App\Events\FieldCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormField extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $table = 'form_fields';

	public function form(): BelongsTo
	{
		return $this->belongsTo(Form::class);
	}

	public static function boot() {
		parent::boot();

		static::created(function($item) {
			FieldCreated::dispatch($item);
		});
	}
}
