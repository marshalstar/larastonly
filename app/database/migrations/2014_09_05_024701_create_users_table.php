<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 255);
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->string("speciality", 255)->nullable(); /** @TODO: melhor não poder duplicar e ser um array */
			$table->boolean('is_admin')->default(false);
			$table->char('gender')->nullable();
			$table->text('biography')->nullable();
			$table->string('picture_url', 255)->nullable();
			$table->timestamps(); /** @TODO: remover esta linha mais tarde */
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
