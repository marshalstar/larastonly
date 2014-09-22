<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('evaluation_id')->unsigned()->index();
			$table->foreign('evaluation_id')->references('id')->on('evaluations');
			$table->integer('alternative_question_id')->unsigned()->index();
			$table->foreign('alternative_question_id')->references('id')->on('alternative_question');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('answers');
	}

}
