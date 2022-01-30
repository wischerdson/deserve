<?php

namespace App\Services\AmoCRM\Fields;

use AmoCRM\Models\CustomFieldsValues\BaseCustomFieldValuesModel;
use App\Models\FormAnswer;
use App\Models\FormField;
use Str;

abstract class Field
{
	public function generate(FormAnswer $answer, FormField $field): BaseCustomFieldValuesModel
	{
		$fieldCode = Str::upper($field->code);

		$valueCollectionClass = $this->getValueCollection();
		$valueClass = $this->getValueModel();
		$valuesClass = $this->getValuesModel();

		$value = new $valueClass();
		$value->setValue($answer->answer);
		$valueCollection = new $valueCollectionClass();
		$valueCollection->add($value);

		$values = new $valuesClass();
		$values->setFieldCode($fieldCode);
		$values->setValues($valueCollection);

		return $values;
	}
}
