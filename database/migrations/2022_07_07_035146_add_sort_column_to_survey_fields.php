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
		Schema::table('survey_fields', function (Blueprint $table) {
			$table->unsignedSmallInteger('sort')->default(0);
		});

		Schema::table('survey_sections', function (Blueprint $table) {
			$table->unsignedSmallInteger('sort')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('survey_fields', function (Blueprint $table) {
			$table->dropColumn('sort');
		});

		Schema::table('survey_sections', function (Blueprint $table) {
			$table->dropColumn('sort');
		});
	}
};
