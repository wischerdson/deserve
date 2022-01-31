<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
	public const MODEL = Form::class;

	private array $forms = [
		[
			'unique' => ['alias' => 'ordering-callback'],
			'attributes' => [
				'name' => 'Заказ обратного звонка',
				'amocrm_pipeline_id' => 5091382
			],
		],
		[
			'unique' => ['alias' => 'brief'],
			'attributes' => [
				'name' => 'Бриф',
				'amocrm_pipeline_id' => 5091388
			],
		]
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->forms as $form) {
			$form = self::MODEL::firstOrCreate($form['unique'], $form['attributes']);
		}
	}
}
