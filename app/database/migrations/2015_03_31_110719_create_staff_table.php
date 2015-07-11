<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffs', function(Blueprint $table)
		{
			$table->increments('id');
            
            $table->string('nombre', 100);
            $table->string('cargo', 100);
            $table->string('imagen');
            $table->string('imagen_carpeta');
            $table->text('descripcion');
            $table->boolean('publicar');
            $table->boolean('orden');
            
			$table->timestamps();
		});

        Schema::create('staff_socials', function(Blueprint $table)
        {
        	$table->increments('id');

            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staffs');

            $table->string('facebook', 100);
            $table->string('twitter', 100);
            $table->string('youtube', 100);
            $table->string('google', 100);
            $table->string('instagram', 100);
            $table->string('linkedin', 100);
            $table->string('tumblr', 100);
            $table->string('pinterest', 100);

        	$table->timestamps();
        	$table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('staff_socials');
		Schema::drop('staffs');
	}

}
