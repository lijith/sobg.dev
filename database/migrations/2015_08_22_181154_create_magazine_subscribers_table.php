<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMagazineSubscribersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('magazine_subscribers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('shipping_id');
			$table->integer('digital')->default(0);
			$table->integer('print')->default(0);
			$table->integer('active')->default(0);
			$table->dateTime('ending_at')->default('0000-00-00 00:00:00');
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
		Schema::drop('magazine_subscribers');
	}

}
