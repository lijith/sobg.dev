<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shippings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id');
			$table->integer('shipping_status')->default(0);
			$table->integer('payment_status')->default(0);
			$table->string('billing_name');
			$table->text('billing_address_1');
			$table->text('billing_address_2');
			$table->string('billing_country');
			$table->string('billing_city');
			$table->string('billing_state');
			$table->string('billing_contact_number_1');
			$table->string('billing_contact_number_2');
			$table->string('shipping_name');
			$table->text('shipping_address_1');
			$table->text('shipping_address_2');
			$table->string('shipping_country');
			$table->string('shipping_city');
			$table->string('shipping_state');
			$table->string('shipping_contact_number_1');
			$table->string('shipping_contact_number_2');
			$table->integer('quantity');
			$table->integer('amount');
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
		Schema::drop('shippings');
	}

}
