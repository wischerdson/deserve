<?php

namespace Database\Seeders;

use App\Models\FormField;
use Illuminate\Database\Seeder;

class FormFieldSeeder extends Seeder
{
	public const MODEL = FormField::class;

	private array $fields = [
		[
			'unique' => ['code' => 'name'],
			'attributes' => [
				'name' => 'Обращение',
				'type' => 'text'
			]
		],
		[
			'unique' => ['code' => 'phone'],
			'attributes' => [
				'name' => 'Телефон',
				'type' => 'text'
			]
		],
		[
			'unique' => ['code' => 'email'],
			'attributes' => [
				'name' => 'Email',
				'type' => 'text'
			]
		],
		[
			'unique' => ['code' => 'budget'],
			'attributes' => [
				'name' => 'Планируемый бюджет',
				'type' => 'text'
			],
		],
		[
			'unique' => ['code' => 'message'],
			'attributes' => [
				'name' => 'Описание задачи',
				'type' => 'textarea'
			],
		],
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->fields as $field) {
			self::MODEL::firstOrCreate($field['unique'], $field['attributes']);
		}
	}
}
