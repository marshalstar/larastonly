<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChecklistTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checklist_tag', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('checklist_id')->unsigned()->index();
			$table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('cascade');
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
		Schema::drop('checklist_tag');
	}

}
