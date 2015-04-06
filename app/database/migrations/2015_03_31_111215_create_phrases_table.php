<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhrasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phrases', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('titulo');
            $table->text('descripcion');
            $table->string('autor', 100);
            $table->boolean('publicar');

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
		Schema::drop('phrases');
	}

}
