<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAnswersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('form_answers', function (Blueprint $table) {
			$table->id();
			$table->foreignId('filled_form_id')->constrained('filled_forms')->onUpdate('cascade')->onDelete('cascade');
			$table->foreignId('form_field_id')->constrained('form_fields')->onUpdate('cascade')->onDelete('cascade');
			$table->text('answer');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('form_answers');
	}
}