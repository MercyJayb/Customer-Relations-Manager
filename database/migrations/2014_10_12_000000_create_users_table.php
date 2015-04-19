<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('levels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('level_name');
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('firstname', 100);
			$table->string('lastname', 100);
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('phone', 100);
			$table->string('code', 100);
			$table->string('level_id', 100);
			$table->softDeletes();
			$table->rememberToken();
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
		Schema::drop('users');
		Schema::drop('levels');
	}

}
