<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
	public const MODEL = Form::class;

	private array $data = [
		[
			'unique' => ['alias' => 'ordering-callback'],
			'attributes' => ['name' => 'Заказ обратного звонка'],
			'relations' => [
				[
					'name' => 'formFields',
					'unique' => ['code' => 'name'],
					'attributes' => ['name' => 'Обращение']
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'phone'],
					'attributes' => ['name' => 'Телефон']
				]
			]
		],
		[
			'unique' => ['alias' => 'brief'],
			'attributes' => ['name' => 'Бриф'],
			'relations' => [
				[
					'name' => 'formFields',
					'unique' => ['code' => 'name'],
					'attributes' => ['name' => 'Обращение']
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'phone'],
					'attributes' => ['name' => 'Телефон']
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'email'],
					'attributes' => ['name' => 'Email']
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'budget'],
					'attributes' => ['name' => 'Планируемый бюджет'],
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'message'],
					'attributes' => ['name' => 'Описание задачи'],
				],
			]
		]
	];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->data as $data) {
			$form = Form::firstOrCreate($data['unique'], $data['attributes']);

			foreach ($data['relations'] as $relation) {
				$form->{$relation['name']}()->firstOrCreate(
					$relation['unique'], $relation['attributes']
				);
			}
		}
	}
}
