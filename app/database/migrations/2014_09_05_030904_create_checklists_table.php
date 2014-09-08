<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChecklistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checklists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('name', 255);
			$table->integer('title_id')->unsigned()->index(); /** @TODO: tentar tirar isto depois */
			$table->foreign('title_id')->references('id')->on('titles');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('checklists');
	}

}
