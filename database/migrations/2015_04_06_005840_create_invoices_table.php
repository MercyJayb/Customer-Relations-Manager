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
		Schema::create('invoice_statuses', function($t)
        {
            $t->increments('id');
            $t->string('name');
        });

        Schema::create('frequency', function($t)
        {
            $t->increments('id');
            $t->string('name');
            $t->unsignedInteger('days');
        });


		Schema::create('invoices', function(Blueprint $t)
		{
			$t->increments('id');

            $t->unsignedInteger('client_id');
            $t->unsignedInteger('user_id');
            $t->unsignedInteger('invoice_status_id')->default(1);
            $t->string('invoice_number');
            $t->float('discount')->nullable();
            $t->date('due_date')->nullable();
            $t->text('terms');
            $t->text('public_notes');
            $t->boolean('is_recurring')->default(true);
            $t->unsignedInteger('frequency_id');
            $t->decimal('amount', 13, 2);

            $t->softDeletes();
            $t->timestamps();
        
            $t->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $t->foreign('invoice_status_id')->references('id')->on('invoice_statuses');


		});

		Schema::create('services', function($t)
        {
            $t->increments('id');
            $t->string('name');
            $t->decimal('cost', 13, 2);
            $t->softDeletes();
            $t->timestamps();

        });

        Schema::create('invoice_items', function($t)
        {
            $t->increments('id');
            $t->unsignedInteger('service_id');
            $t->unsignedInteger('client_id');
            $t->unsignedInteger('quantity');
            $t->decimal('cost', 13, 2);
            $t->decimal('total', 13, 2);
            $t->softDeletes();
            $t->timestamps();

            $t->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $t->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice_items');
        Schema::drop('services');
		Schema::drop('invoices');
        Schema::drop('frequency');
		Schema::drop('invoice_statuses');
	}

}
