<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormAnswer extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $table = 'form_answers';

	protected $fillable = ['answer'];

	public function formField(): BelongsTo
	{
		return $this->belongsTo(FormField::class);
	}

	public function filledForm(): BelongsTo
	{
		return $this->belongsTo(FilledForm::class);
	}
}
