<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $survey_id
 * @property string $title
 */
class Section extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $table = 'survey_sections';

	protected static $unguarded = true;

	public function survey(): BelongsTo
	{
		return $this->belongsTo(Survey::class, 'survey_id');
	}

	public function fields(): HasMany
	{
		return $this->hasMany(Field::class, 'survey_section_id');
	}
}
