<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('checklist_id')->unsigned()->index();
            $table->foreign('checklist_id')->references('id')->on('checklists');
			$table->text('commentary')->default("");
			$table->timestamps();
			
			
            
            $table->integer('place_id')->unsigned()->index()->nullable();
            $table->foreign('place_id')->references('id')->on('places');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('evaluations');
	}

}
