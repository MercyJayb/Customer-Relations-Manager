<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices_items', function(Blueprint $table)
		{
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('client_service_id');
            $table->decimal('charge', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('CASCADE');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('CASCADE');
            $table->foreign('client_service_id')->references('id')->on('client_services')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices_items');
	}

}
