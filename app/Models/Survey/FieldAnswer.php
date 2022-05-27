<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $survey_project_id
 * @property int $survey_field_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class FieldAnswer extends Model
{
	use HasFactory;

	public $timestamps = true;

	protected $table = 'survey_field_answers';

	protected static $unguarded = true;

	public function surveyProject(): BelongsTo
	{
		return $this->belongsTo(Project::class, 'survey_project_id');
	}

	public function surveyField(): BelongsTo
	{
		return $this->belongsTo(Field::class, 'survey_field_id');
	}
}
