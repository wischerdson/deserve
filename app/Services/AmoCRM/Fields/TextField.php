<?php

namespace App\Services\AmoCRM\Fields;

use AmoCRM\Models\CustomFields\TextCustomFieldModel;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;

class TextField extends Field
{
	const MODEL = TextCustomFieldModel::class;

	const VALUE_COLLECTION = TextCustomFieldValueCollection::class;

	const VALUE_MODEL = TextCustomFieldValueModel::class;

	const VALUES_MODEL = TextCustomFieldValuesModel::class;

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
