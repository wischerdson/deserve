<?php

namespace App\Http\Controllers;

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

		$answers = $request->collect()->reduce(
			function (array $answers, string $answer, string $fieldCode) {
				$formField = FormField::where('code', $fieldCode)->first();
				$formAnswer = new FormAnswer([ 'answer' => $answer ]);
				$formAnswer->form_field_id = $formField->id;
				$answers[] = $formAnswer;
				return $answers;
			}
		, []);

		$form->filledForms()->save($filledForm);
		$filledForm->formAnswers()->saveMany($answers);

		return '$answers';
	}
}
