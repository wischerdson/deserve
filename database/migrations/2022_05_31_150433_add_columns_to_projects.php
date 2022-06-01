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
		Schema::table('survey_projects', function (Blueprint $table) {
			$table->after('alias', function ($table) {
				$table->string('phone')->nullable();
				$table->string('name')->nullable();
				$table->enum('status', ['before', 'payment', 'completed'])->default('before');
			});
			$table->timestamp('created_at')->nullable()->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('survey_projects', function (Blueprint $table) {
			$table->dropColumn(['phone', 'name', 'status']);
		});
	}
};
