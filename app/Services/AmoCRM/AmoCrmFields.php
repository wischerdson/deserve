<?php

namespace App\Services\AmoCRM;

use AmoCRM\Collections\CustomFields\CustomFieldsCollection;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\EntitiesServices\CustomFields;
use AmoCRM\Exceptions\AmoCRMApiException;
use App\Services\AmoCRM\Exceptions\MissingRequiredFieldAssociationException;
use App\Models\FormAnswer;
use App\Models\FormField;
use App\Services\AmoCRM\Fields\TextareaField;
use App\Services\AmoCRM\Fields\TextField;
use Illuminate\Database\Eloquent\Collection;
use Str;

class AmoCrmFields
{
	const MODELS_ACCOCIATION = [
		'text' => TextField::class,
		'textarea' => TextareaField::class
	];

	public function generate(Collection $formAnswers): CustomFieldsValuesCollection
	{
		$collection = new CustomFieldsValuesCollection();
		$formAnswers->loadMissing('formField');

		$formAnswers->each(function (FormAnswer $answer) use ($collection) {
			$formField = $answer->formField;
			$fieldClass = $this->getFieldClass($formField);

			$field = new $fieldClass();

			$collection->add($field->generate($answer, $formField));
		});

		return $collection;
	}

	/**
	 * Публикует все поля у которых нет amocrm_id
	 */
	public function publishFields(Collection $fields, CustomFields $service): void
	{
		$notPublishedFields = $fields->whereNull('amocrm_id');

		if ($notPublishedFields->isEmpty()) {
			return;
		}

		$fieldsFromAmocrm = $service->get();

		$collection = new CustomFieldsCollection();

		$notPublishedFields->each(function (FormField $formField) use ($collection) {
			$modelClass = self::getFieldClass($formField)::MODEL;
			$cf = new $modelClass();
			$cf->setName($formField->name);
			$cf->setSort($formField->id);
			$cf->setCode(Str::upper($formField->code));
			$collection->add($cf);
		});

		try {
			$response = $service->add($collection);
		} catch (AmoCRMApiException $e) {
			dd($e);
		}

		$fields = $response->all();

		foreach ($fields as $field) {
			FormField::where('code', Str::lower($field->getCode()))->update([
				'amocrm_id' => $field->getId()
			]);
		}
	}

	/**
	 * @throws \App\Services\AmoCRM\Exceptions\MissingRequiredFieldAssociationException
	 */
	public static function getFieldClass(FormField $field): string
	{
		if (array_key_exists($field->type, self::MODELS_ACCOCIATION)) {
			return self::MODELS_ACCOCIATION[$field->type];
		}

		throw new MissingRequiredFieldAssociationException($field->type);
	}
}
