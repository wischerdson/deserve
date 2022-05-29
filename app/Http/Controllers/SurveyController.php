<?php

namespace App\Http\Controllers;

use App\Models\Survey\FieldAnswer as SurveyFieldAnswer;
use App\Models\Survey\Project as SurveyProject;
use App\Models\Survey\Survey;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
	public function show(string $surveyType, string $projectAlias)
	{
		$survey = Survey::where('type', $surveyType)->firstOrFail();
		$project = SurveyProject::select(['id'])
			->where('survey_id', $survey->id)
			->where('alias', $projectAlias)
			->first();

		if (!$project) {
			$project = new SurveyProject(['alias' => $projectAlias]);
			$survey->projects()->save($project);
		}

		$project = SurveyProject::whereKey($project->id)
			->with(['sections.fields.fieldAnswers' => function (HasMany $query) use ($project) {
				$query->where('survey_project_id', $project->id);
			}])
			->first();

		return [
			'survey' => $survey,
			'project' => $project
		];
	}

	public function saveFields(Request $request)
	{
		$fields = $request->fields;

		foreach ($fields as $fieldId => $content) {
			SurveyFieldAnswer::updateOrCreate([
				'survey_project_id' => $request->project_id,
				'survey_field_id' => $fieldId
			], [
				'content' => $content ?: ''
			]);
		}

		return 'ok';
	}
}