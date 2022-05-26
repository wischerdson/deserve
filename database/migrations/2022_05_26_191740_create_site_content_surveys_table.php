<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContentSurveysTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_content_surveys', function (Blueprint $table) {
			$table->id();
			$table->string('alias');
		});

		Schema::create('site_content_survey_form', function (Blueprint $table) {
			$table->foreignId('survey_id')
				->constrained('site_content_surveys')
				->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('form_id')
				->constrained('forms')
				->cascadeOnUpdate()->cascadeOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('site_content_survey_form');
		Schema::dropIfExists('site_content_surveys');
	}
}
