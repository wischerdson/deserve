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
		Schema::create('survey_projects', function (Blueprint $table) {
			$table->id();
			$table->foreignId('survey_id')
				->constrained('surveys')
				->cascadeOnUpdate()->cascadeOnDelete();
			$table->string('alias')->unique();
			$table->timestamp('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survey_projects');
	}
};
