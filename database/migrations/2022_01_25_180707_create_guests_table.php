<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guests', function (Blueprint $table) {
			$table->id();
			$table->text('user_agent')->nullable();
			$table->ipAddress('ip')->nullable();
			$table->string('ip_country_code', 2)->nullable();
			$table->string('ip_region')->nullable();
			$table->string('ip_city')->nullable();
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
		Schema::dropIfExists('guests');
	}
}
