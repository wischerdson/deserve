<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string $description
 */
class Survey extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $table = 'surveys';

	protected static $unguarded = true;

	public function projects(): HasMany
	{
		return $this->hasMany(Project::class, 'survey_id');
	}

	public function sections(): HasMany
	{
		return $this->hasMany(Section::class, 'survey_id');
	}

	public function fields(): HasManyThrough
	{
		return $this->hasManyThrough(Field::class, Section::class, 'survey_id', 'survey_section_id');
	}
}
