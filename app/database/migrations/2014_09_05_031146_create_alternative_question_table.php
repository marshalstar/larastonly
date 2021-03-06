<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlternativeQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alternative_question', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('alternative_id')->unsigned()->index();
			$table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
			$table->integer('question_id')->unsigned()->index();
			$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('alternative_question');
	}

}
