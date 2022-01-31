<?php

namespace App\Services\AmoCRM\Fields;

use AmoCRM\Models\CustomFields\TextCustomFieldModel;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;

class TextField extends Field
{
	const MODEL = TextCustomFieldModel::class;

	public function getValueModel(): string
	{
		return TextCustomFieldValueModel::class;
	}

	public function getValueCollection(): string
	{
		return TextCustomFieldValueCollection::class;
	}

	public function getValuesModel(): string
	{
		return TextCustomFieldValuesModel::class;
	}
}
