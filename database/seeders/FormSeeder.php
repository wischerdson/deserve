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
			'attributes' => [
				'name' => 'Заказ обратного звонка',
				'amocrm_pipeline_id' => 5091382
			],
			'relations' => [
				[
					'name' => 'formFields',
					'unique' => ['code' => 'name'],
					'attributes' => [
						'name' => 'Обращение',
						'amocrm_type' => 'text'
					]
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'phone'],
					'attributes' => [
						'name' => 'Телефон',
						'amocrm_type' => 'text'
					]
				]
			]
		],
		[
			'unique' => ['alias' => 'brief'],
			'attributes' => [
				'name' => 'Бриф',
				'amocrm_pipeline_id' => 5091388
			],
			'relations' => [
				[
					'name' => 'formFields',
					'unique' => ['code' => 'name'],
					'attributes' => [
						'name' => 'Обращение',
						'amocrm_type' => 'text'
					]
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'phone'],
					'attributes' => [
						'name' => 'Телефон',
						'amocrm_type' => 'text'
					]
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'email'],
					'attributes' => [
						'name' => 'Email',
						'amocrm_type' => 'text'
					]
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'budget'],
					'attributes' => [
						'name' => 'Планируемый бюджет',
						'amocrm_type' => 'text'
					],
				],
				[
					'name' => 'formFields',
					'unique' => ['code' => 'message'],
					'attributes' => [
						'name' => 'Описание задачи',
						'amocrm_type' => 'textarea'
					],
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
