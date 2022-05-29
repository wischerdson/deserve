<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([
			FormSeeder::class,
			FormFieldSeeder::class,
			SurveySeeder::class,
			SurveySectionSeeder::class,
			SurveyFieldSeeder::class,
		]);
	}
}
