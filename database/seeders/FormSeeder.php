<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
	public const MODEL = Form::class;

	public const UNIQUE = 'alias';

	private array $data = [
		[
			'alias' => 'ordering-callback',
			'name' => 'Заказ обратного звонка',
			'amocrm_pipeline_id' => 5091382
		],
		[
			'alias' => 'brief',
			'name' => 'Бриф',
			'amocrm_pipeline_id' => 5091388
		],
		[
			'alias' => 'feedback',
			'name' => 'Обратная связь',
			'amocrm_pipeline_id' => 5116267
		],
		[
			'alias' => 'vacanancy',
			'name' => 'Вакансия',
			'amocrm_pipeline_id' => 5116270
		]
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->data as $form) {
			self::MODEL::firstOrCreate([
				self::UNIQUE => $form[self::UNIQUE]
			], $form);
		}
	}
}
