<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMagazinesTable1 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('magazines', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('magazine_file');
			$table->integer('price');
			$table->string('slug')->unique();
			$table->text('excerpt');
			$table->text('keywords');
			$table->text('details');
			$table->string('cover_photo');
			$table->string('cover_photo_thumbnail');
			$table->timestamp('published_at');
			$table->string('mail_list');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}

}
