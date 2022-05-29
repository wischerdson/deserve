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
		Schema::create('survey_fields', function (Blueprint $table) {
			$table->id();
			$table->foreignId('survey_section_id')
				->constrained('survey_sections')
				->cascadeOnUpdate()->cascadeOnDelete();
			$table->string('type');
			$table->string('label');
			$table->text('placeholder')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survey_fields');
	}
};
