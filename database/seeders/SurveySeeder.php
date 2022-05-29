<?php

namespace Database\Seeders;

use App\Models\Survey\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
	use WithoutModelEvents;

	public const MODEL = Survey::class;

	public const UNIQUE = 'type';

	private array $data = [
		[
			'id' => 1,
			'type' => 'psy',
			'title' => 'Брифинг сайта @{{ project_name }}',
			'description' => 'Здравствуйте, {{ client_name }}, мы очень рады, что Вы решили выбрать нас. На этой странице находится брифинг, данные из которого будут использованы на Вашем сайте. Во время разработки Вы всегда можете зайти на эту страницу и изменить или добавить что-либо. Вот контакт вашего менеджера в WhatsApp <a href'
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
