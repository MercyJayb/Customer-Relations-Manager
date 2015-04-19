<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('frequency');
            $table->text('comments')->nullable();
            $table->boolean('status')->default(false);
            $table->decimal('total', 10, 2);
            $table->datetime('date_due');
            $table->softDeletes();
			$table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}
