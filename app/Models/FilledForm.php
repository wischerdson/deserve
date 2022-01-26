<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FilledForm extends Model
{
	use HasFactory;

	const UPDATED_AT = null;

	protected $table = 'filled_forms';

	public function form(): BelongsTo
	{
		return $this->belongsTo(Form::class);
	}

	public function formAnswers(): HasMany
	{
		return $this->hasMany(FormAnswer::class);
	}
}
