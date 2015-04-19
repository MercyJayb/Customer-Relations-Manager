<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	

	// abcchildrensaidkenya.or.ke,
	// 199.188.200.187,
	// abcchildrensaidk,
	// info@abcchildrensaidkenya.or.ke,
	// 15 Mar 24 02:26,
	// home,
	// 1000,
	// ,
	// bluecosp_Blue Basic,
	// x3,
	// bluecosp,
	// host14.registrar-servers.com,
	// 1427178389,
	// 204,
	// 1024000

	// Domain,
	// IP,
	// User Name,
	// Email,
	// Start Date,
	// Disk Partition,
	// Quota,
	// Disk Space Used,
	// Package,
	// Theme,
	// Owner,
	// Server,
	// Unix Startdate,
	// Disk Space Used (bytes),
	// Quota (bytes)




	public function up()
	{
		Schema::create('domains', function(Blueprint $table)
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

            $table->boolean('paid')->default(true);
		
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
		Schema::drop('domains');
	}

}
