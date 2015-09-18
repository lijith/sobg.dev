<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArchivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('archives', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();
			$table->text('excerpt', 65535);
			$table->text('keywords', 65535);
			$table->text('details', 65535);
			$table->dateTime('date')->default('0000-00-00 00:00:00');
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
		Schema::drop('archives');
	}

}
