<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $table = 'forms';

	public function formFields(): HasMany
	{
		return $this->hasMany(FormField::class);
	}

	public function filledForms(): HasMany
	{
		return $this->hasMany(FilledForm::class);
	}
}
