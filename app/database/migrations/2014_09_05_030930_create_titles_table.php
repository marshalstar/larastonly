<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTitlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('titles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('title_id')->unsigned()->index()->nullable();
            $table->foreign('title_id')->references('id')->on('titles');
			// $table->integer('checklist_id')->unsigned()->index();
            // $table->foreign('checklist_id')->references('id')->on('checklists');
			$table->string('name', 255);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('titles');
	}

}
