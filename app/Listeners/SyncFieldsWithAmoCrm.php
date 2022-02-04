<?php

namespace App\Listeners;

use AmoCRM\Collections\CustomFields\CustomFieldsCollection;
use AmoCRM\EntitiesServices\CustomFields;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Helpers\EntityTypesInterface;
use App\Events\FieldCreated;
use App\Models\FormField;
use App\Services\AmoCRM\AmoCrmFields;
use App\Services\AmoCRM\AmoCrmService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Str;

class SyncFieldsWithAmoCrm implements ShouldQueue
{
	private CustomFields $fieldService;

	public function __construct()
	{
		$amocrmService = new AmoCrmService();
		$this->fieldService = $amocrmService->getClient()->customFields(EntityTypesInterface::LEADS);
	}

	/**
	 * Handle the event.
	 *
	 * @param  object  $event
	 * @return void
	 */
	public function handle(FieldCreated $event)
	{
		$this->refreshLocalFields();

		$collection = new CustomFieldsCollection();

		$unpublished = FormField::whereNull('amocrm_id')->get();

		if ($unpublished->isEmpty()) {
			return;
		}

		$unpublished->each(function (FormField $field) use ($collection) {
			$class = AmoCrmFields::getFieldClass($field)::MODEL;
			$cf = new $class();
			$cf->setName($field->name);
			$cf->setSort($field->id);
			$cf->setCode(Str::upper($field->code));
			$collection->add($cf);
		});

		try {
			$response = $this->fieldService->add($collection);
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
	 * Вытаскивает все уже существующие поля из amocrm, сверяет code - при совпадении
	 * устанавливает amocrm_id
	 */
	private function refreshLocalFields(): void
	{
		$amocrmFields = $this->getAmoCrmFields();
		$amocrmFields->each(function (array $field) {
			$code = Str::lower($field['code']);
			FormField::where('code', $code)->update([
				'amocrm_id' => $field['id']
			]);
		});
	}

	/**
	 * Отдает все существующие поля из amocrm из группы по умолчанию
	 */
	private function getAmoCrmFields(): Collection
	{
		return collect($this->fieldService->get())->whereNull('group_id');;
	}
}
