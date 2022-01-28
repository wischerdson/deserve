<?php

namespace App\Services\AmoCRM;

use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\BaseCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;

class AmoCrmFields
{
	private array $fields;

	public function __construct(array $fields)
	{
		$this->fields = $fields;
	}

	public function generate(): CustomFieldsValuesCollection
	{
		$collection = new CustomFieldsValuesCollection();

		foreach ($this->fields as $code => $value) {
			$collection->add($this->getCustomField($code, (string) $value));
		}

		return $collection;
	}

	private function getCustomField(string $code, string $value): TextCustomFieldValuesModel
	{
		$textCustomFieldValueModel = new TextCustomFieldValuesModel();
		$textCustomFieldValueModel->setFieldCode($code);
		$textCustomFieldValueModel->setValues($this->getCustomFieldValue($value));
		return $textCustomFieldValueModel;
	}

	private function getCustomFieldValue(string $value): BaseCustomFieldValueCollection
	{
		$collection = new TextCustomFieldValueCollection();
		$fieldValue = new TextCustomFieldValueModel();
		$fieldValue->setValue($value);
		$collection->add($fieldValue);

		return $collection;
	}
}
