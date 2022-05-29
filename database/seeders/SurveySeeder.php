<?php

namespace Database\Seeders;

use App\Models\Survey\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
	use WithoutModelEvents;

	private string $rootModel;

	private string $uniqueField;

	public function run()
	{
		$data = (array) json_decode(file_get_contents(__DIR__.'/json/survey.json'));
		$this->rootModel = $data['root_model'];
		$this->uniqueField = $data['unique'];
		$this->saveRecursive($data['start']);
	}

	private function saveRecursive(array $rows, string $relatedModel = null, bool $isRoot = true)
	{
		foreach ($rows as $row) {
			foreach ($row as $key => $value) {
				if (is_array($value)) {

					$this->saveRecursive($value, $key, false);
				} else {

				}
			}
		}
	}
}
