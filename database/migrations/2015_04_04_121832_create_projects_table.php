<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->string('title');
			$table->text('description');
			$table->date('start_at');
			$table->date('end_at');
			$table->integer('status')->unsigned();
			$table->softDeletes();
			$table->timestamps();

			$table->foreign('client_id')
				->references('id')
				->on('clients')
				->onDelete('cascade');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
