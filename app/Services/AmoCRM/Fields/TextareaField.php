<?php

namespace App\Services\AmoCRM\Fields;

use AmoCRM\Models\CustomFields\TextareaCustomFieldModel;
use AmoCRM\Models\CustomFieldsValues\TextareaCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextareaCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextareaCustomFieldValueModel;

class TextareaField extends Field
{
	const MODEL = TextareaCustomFieldModel::class;

	public function getValueModel(): string
	{
		return TextareaCustomFieldValueModel::class;
	}

	public function getValueCollection(): string
	{
		return TextareaCustomFieldValueCollection::class;
	}

	public function getValuesModel(): string
	{
		return TextareaCustomFieldValuesModel::class;
	}
}
