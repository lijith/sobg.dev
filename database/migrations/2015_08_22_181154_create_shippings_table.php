<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('reference_id');
			$table->integer('shipping_status')->default(0);
			$table->integer('payment_status')->default(0);
			$table->string('billing_name');
			$table->text('billing_address_1', 65535);
			$table->text('billing_address_2', 65535);
			$table->string('billing_country');
			$table->string('billing_city');
			$table->string('billing_state');
			$table->string('billing_contact_number_1');
			$table->string('billing_contact_number_2');
			$table->string('shipping_name');
			$table->text('shipping_address_1', 65535);
			$table->text('shipping_address_2', 65535);
			$table->string('shipping_country');
			$table->string('shipping_city');
			$table->string('shipping_state');
			$table->string('shipping_contact_number_1');
			$table->string('shipping_contact_number_2');
			$table->string('billing_email');
			$table->string('shipping_email');
			$table->integer('quantity');
			$table->integer('amount');
			$table->integer('admin_viewed');
			$table->timestamps();
			$table->text('comments', 65535);
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
