<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsBackupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domains_backup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('client_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('domain');
			$table->string('ip');
			$table->string('username');
			$table->string('email');
			$table->datetime('start_date');
			$table->string('disk_partition');
			$table->string('quota');
			$table->string('disk_space_used');
			$table->string('package');
			$table->string('theme');
			$table->string('owner');
			$table->string('server');
			$table->string('unix_start_date');
			$table->string('disk_space_used_bytes');
			$table->string('quota_bytes');
		
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
		Schema::drop('domains_backup');
	}

}
