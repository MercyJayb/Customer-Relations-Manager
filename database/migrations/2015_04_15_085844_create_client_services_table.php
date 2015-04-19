<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_services', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('service_id');
            $table->decimal('cost', 10, 2);
            $table->unsignedInteger('frequency');
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
		Schema::drop('client_services');
	}

}
