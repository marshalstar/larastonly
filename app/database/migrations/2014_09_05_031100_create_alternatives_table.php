<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlternativesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alternatives', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255)->nullable();
			$table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('types');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('alternatives');
	}

}
