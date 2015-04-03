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
			$table->integer('status')->default(0);
			$table->string('name');
			$table->text('address_1');
			$table->text('address_2');
			$table->string('country');
			$table->string('city');
			$table->string('state');
			$table->string('contact_number_1');
			$table->string('contact_number_2');
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
