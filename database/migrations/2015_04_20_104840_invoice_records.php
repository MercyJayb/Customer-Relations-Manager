<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceRecords extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_records', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('client_service_id');
            $table->unsignedInteger('client_id');
            $table->decimal('total', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('discount_details', 100)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->string('tax_details', 100)->nullable();
            $table->datetime('due_date');
            $table->boolean('status')->default(false);
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
		Schema::drop('invoice_records');
	}

}
