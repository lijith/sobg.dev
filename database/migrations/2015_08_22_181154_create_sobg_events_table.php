<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSobgEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sobg_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();
			$table->text('excerpt', 65535);
			$table->text('keywords', 65535);
			$table->text('details', 65535);
			$table->string('cover_photo');
			$table->string('cover_photo_thumbnail');
			$table->string('attachment');
			$table->dateTime('start_date')->default('0000-00-00 00:00:00');
			$table->dateTime('end_date')->default('0000-00-00 00:00:00');
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
		Schema::drop('sobg_events');
	}

}
