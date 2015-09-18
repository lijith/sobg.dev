<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('author');
			$table->integer('price');
			$table->string('slug')->unique();
			$table->text('excerpt', 65535);
			$table->text('keywords', 65535);
			$table->text('details', 65535);
			$table->string('cover_photo');
			$table->string('cover_photo_thumbnail');
			$table->string('language');
			$table->dateTime('published_at')->default('0000-00-00 00:00:00');
			$table->integer('published_by');
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
		Schema::drop('books');
	}

}
