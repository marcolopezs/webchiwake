<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abouts', function(Blueprint $table)
		{
			$table->increments('id');

			$table->text('about');
			$table->string('about_imagen');
			$table->string('about_imagen_carpeta');

			$table->text('mision');
			$table->text('vision');
			$table->string('misvis_imagen');
			$table->string('misvis_imagen_carpeta');

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
		Schema::drop('abouts');
	}

}
