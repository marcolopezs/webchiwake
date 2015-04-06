<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeLapsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('time_lapses', function(Blueprint $table)
		{
			$table->increments('id');
            
            $table->string('anio');
            $table->string('descripcion', 100);
            $table->string('imagen', 100);
            $table->string('imagen_carpeta', 100);
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
		Schema::drop('time_lapses');
	}

}
