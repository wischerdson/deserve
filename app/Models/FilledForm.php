<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class FilledForm extends Model
{
	use HasFactory;

	const UPDATED_AT = null;

	protected $table = 'filled_forms';

	public function form(): BelongsTo
	{
		return $this->belongsTo(Form::class);
	}

	public function answers(): HasMany
	{
		return $this->hasMany(FormAnswer::class);
	}

	public function formFields(): HasManyThrough
	{
		return $this->hasManyThrough(
			FormField::class,
			FormAnswer::class,
			'filled_form_id',
			'id',
			'id',
			'form_field_id'
		);
	}
}
