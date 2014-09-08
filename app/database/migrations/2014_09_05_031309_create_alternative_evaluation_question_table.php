<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlternativeEvaluationQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alternative_evaluation_question', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('alternative_id')->unsigned()->index();
			$table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
			$table->integer('evaluation_id')->unsigned()->index();
			$table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
			$table->integer('question_id')->unsigned()->index();
			$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
			$table->timestamps(); /** @TODO: tentar tirar isto aqui depois */
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alternative_evaluation');
	}

}
