<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakeTendersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fake_tenders', function(Blueprint $table)
		{
            $table->increments('id');
            $table->unsignedInteger('client');
            $table->string('title');
            $table->text('description');
            $table->datetime('start_date');
            $table->softDeletes();
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
		Schema::drop('fake_tenders');
	}

}
