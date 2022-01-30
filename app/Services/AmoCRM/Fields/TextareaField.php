<?php

namespace App\Services\AmoCRM\Fields;

use AmoCRM\Models\CustomFields\TextareaCustomFieldModel;
use AmoCRM\Models\CustomFieldsValues\TextareaCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextareaCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextareaCustomFieldValueModel;

class TextareaField extends Field
{
	const MODEL = TextareaCustomFieldModel::class;

	const VALUE_COLLECTION = TextareaCustomFieldValueCollection::class;

	const VALUE_MODEL = TextareaCustomFieldValueModel::class;

	const VALUES_MODEL = TextareaCustomFieldValuesModel::class;

	public function getValueModel(): string
	{
		return self::VALUE_MODEL;
	}

	public function getValueCollection(): string
	{
		return self::VALUE_COLLECTION;
	}

	public function getValuesModel(): string
	{
		return self::VALUES_MODEL;
	}
}
