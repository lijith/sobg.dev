<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoDisksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('video_disks', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('title');
      $table->string('author');
      $table->integer('price');
      $table->string('slug')->unique();
      $table->text('excerpt');
      $table->text('keywords');
      $table->text('details');
      $table->string('cover_photo');
      $table->string('cover_photo_thumbnail');
      $table->string('youtube_link');
      $table->timestamp('published_at');
      $table->integer('disk_type');
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
		Schema::drop('video_disks');
	}

}
