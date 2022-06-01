<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property int $survey_id
 * @property string $alias
 * @property string $created_at
 */
class Project extends Model
{
	use HasFactory;

	const UPDATED_AT = null;

	protected $table = 'survey_projects';

	protected static $unguarded = true;

	protected $casts = [
		'created_at' => 'timestamp',
	];

	public function survey(): BelongsTo
	{
		return $this->belongsTo(Survey::class, 'survey_id');
	}

	public function fieldAnswers(): HasMany
	{
		return $this->hasMany(FieldAnswer::class, 'survey_project_id');
	}

	public function sections(): HasManyThrough
	{
		return $this->hasManyThrough(Section::class, Survey::class, 'id', 'survey_id', 'survey_id', 'id');
	}
}
