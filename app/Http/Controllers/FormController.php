<?php

namespace App\Http\Controllers;

use App\Events\FormFilled;
use App\Models\FilledForm;
use App\Models\Form;
use App\Models\FormAnswer;
use App\Models\FormField;
use Illuminate\Http\Request;

class FormController extends Controller
{
	public function fillForm(string $formAlias, Request $request)
	{
		$form = Form::where('alias', $formAlias)->first();
		$filledForm = new FilledForm();

		$requestCollection = $request->collect();
		$requestCollection->put('form_filled_id', null);

		$answers = $requestCollection->reduce(
			function (array $answers, ?string $answer, string $fieldCode) {
				$formField = FormField::where('code', $fieldCode)->first();

				if (!$formField) {
					return $answers;
				}

				$formAnswer = new FormAnswer([ 'answer' => $answer ]);
				$formAnswer->form_field_id = $formField->id;

				$answers[] = $formAnswer;

				return $answers;
			}
		, []);

		$form->filledForms()->save($filledForm);
		$filledForm->answers()->saveMany($answers);

		FormAnswer::whereRelation('formField', 'code', 'form_filled_id')
			->where('filled_form_id', $filledForm->id)
			->update(['answer' => $filledForm->id]);

		FormFilled::dispatch($filledForm);

		return 'ok';
	}
}
