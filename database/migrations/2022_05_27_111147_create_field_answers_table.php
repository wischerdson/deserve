<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_field_answers', function (Blueprint $table) {
			$table->id();
			$table->foreignId('survey_project_id')
				->constrained('survey_projects')
				->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('survey_field_id')
				->constrained('survey_fields')
				->cascadeOnUpdate()->cascadeOnDelete();
			$table->text('content');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survey_field_answers');
	}
};
