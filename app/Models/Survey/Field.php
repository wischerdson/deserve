<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $survey_section_id
 * @property string $type
 * @property string $label
 * @property string $placeholder
 */
class Field extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $table = 'survey_fields';

	protected static $unguarded = true;

	public function surveySection(): BelongsTo
	{
		return $this->belongsTo('survey_section_id');
	}

	public function fieldAnswers(): HasMany
	{
		return $this->hasMany(FieldAnswer::class, 'survey_field_id');
	}
}
