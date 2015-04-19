<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('content');
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('user_id');
            $table->softDeletes();
			$table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->ondelete('CASCADE');
            $table->foreign('task_id')->references('id')->on('tasks')->ondelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
