<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Magazine extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('magazines', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('title');
      $table->string('magazine_file')->default('NO-ATTACHMENT');
      $table->integer('price');
      $table->string('slug')->unique();
      $table->text('excerpt');
      $table->text('keywords');
      $table->text('details');
      $table->string('cover_photo');
      $table->string('cover_photo_thumbnail');
      $table->timestamp('published_at');
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
		Schema::drop('magazines');
	}

}
