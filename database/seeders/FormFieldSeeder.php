<?php

namespace Database\Seeders;

use App\Models\FormField;
use Illuminate\Database\Seeder;

class FormFieldSeeder extends Seeder
{
	public const MODEL = FormField::class;

	public const UNIQUE = 'code';

	private array $data = [
		[
			'code' => 'name',
			'name' => 'Обращение',
			'type' => 'text'
		],
		[
			'code' => 'phone',
			'name' => 'Телефон',
			'type' => 'text'
		],
		[
			'code' => 'email',
			'name' => 'Email',
			'type' => 'text'
		],
		[
			'code' => 'budget',
			'name' => 'Планируемый бюджет',
			'type' => 'text'
		],
		[
			'code' => 'task_description',
			'name' => 'Описание задачи',
			'type' => 'textarea'
		],
		[
			'code' => 'message',
			'name' => 'Сообщение',
			'type' => 'textarea'
		],
		[
			'code' => 'vacancy',
			'name' => 'Вакансия',
			'type' => 'text'
		],
		[
			'code' => 'form_filled_id',
			'name' => 'ID формы',
			'type' => 'text'
		]
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->data as $field) {
			self::MODEL::firstOrCreate([
				self::UNIQUE => $field[self::UNIQUE]
			], $field);
		}
	}
}
