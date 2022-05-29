<?php

namespace Database\Seeders;

use App\Models\Survey\Field as SurveyField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyFieldSeeder extends Seeder
{
	use WithoutModelEvents;

	public const MODEL = SurveyField::class;

	public const UNIQUE = 'id';

	private array $data = [
		[
			'id' => 1,
			'survey_section_id' => 1, // Главный экран
			'type' => 'input',
			'label' => 'ФИО',
			'placeholder' => 'Лебедева Анна Игоревна',
		],
		[
			'id' => 2,
			'survey_section_id' => 1, // Главный экран
			'type' => 'textarea',
			'label' => 'Охарактеризуйте ваши сильные качества в <b>4</b> словах',
			'placeholder' => 'профессионализм, конфиденциальность, многопрофильность, нацеленность на результат',
		],
		[
			'id' => 3,
			'survey_section_id' => 2, // Обо мне
			'type' => 'textarea',
			'label' => 'Образование',
			'placeholder' => 'Закончила Сочинский Государственный Университет по специальности «Консультативная психология/психотерапия»',
		],
		[
			'id' => 4,
			'survey_section_id' => 2, // Обо мне
			'type' => 'textarea',
			'label' => 'Моя история',
			'placeholder' => 'Закончила Сочинский Государственный Университет по специальности «Консультативная психология/психотерапия»',
		],
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ($this->data as $row) {
			self::MODEL::firstOrCreate([
				self::UNIQUE => $row[self::UNIQUE]
			], $row);
		}
	}
}
