<?php

namespace Database\Seeders;

use App\Models\Survey\Section as SurveySection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySectionSeeder extends Seeder
{
	use WithoutModelEvents;

	public const MODEL = SurveySection::class;

	public const UNIQUE = 'id';

	private array $data = [
		[
			'id' => 1,
			'survey_id' => 1,
			'title' => 'Главный экран',
		],
		[
			'id' => 2,
			'survey_id' => 1,
			'title' => 'Блок “Об мне”',
		],
		[
			'id' => 3,
			'survey_id' => 1,
			'title' => 'Блок “Проблемы, которые я помогу решить вам:”',
		],
		[
			'id' => 4,
			'survey_id' => 1,
			'title' => 'Блок “Услуги и цены”',
		],
		[
			'id' => 5,
			'survey_id' => 1,
			'title' => 'Блок “Отзывы”',
		],
		[
			'id' => 6,
			'survey_id' => 1,
			'title' => 'Блок “Контакты”',
		]
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->data as $row) {
			self::MODEL::updateOrCreate([
				self::UNIQUE => $row[self::UNIQUE]
			], $row);
		}
	}
}
