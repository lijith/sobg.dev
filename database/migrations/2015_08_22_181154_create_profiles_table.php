<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id')->unique();
			$table->string('name');
			$table->integer('gender');
			$table->dateTime('dob');
			$table->string('nationality');
			$table->string('profession');
			$table->integer('marital_status');
			$table->text('permanent_address_1', 65535);
			$table->text('permanent_address_2', 65535);
			$table->string('permanent_country');
			$table->string('permanent_city');
			$table->string('permanent_state');
			$table->text('contact_address_1', 65535);
			$table->text('contact_address_2', 65535);
			$table->string('contact_country');
			$table->string('contact_city');
			$table->string('contact_state');
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
		Schema::drop('profiles');
	}

}
