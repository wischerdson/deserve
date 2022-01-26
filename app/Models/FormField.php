<?php

namespace App\Models;

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
}
