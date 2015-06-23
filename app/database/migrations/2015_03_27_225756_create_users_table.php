<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('estado');

            $table->rememberToken();

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });


        /* MENU */

        Schema::create('menu_categories', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->text('descripcion');
            $table->integer('orden')->unsigned();

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        Schema::create('menus', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->string('precio');
            $table->text('descripcion');
            $table->string('imagen');
            $table->string('imagen_carpeta');
            $table->boolean('publicar')->default(false);

            $table->integer('menu_category_id')->unsigned()->nullable();
            $table->foreign('menu_category_id')->references('id')->on('menu_categories');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('published_at');
            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

        /* CONFIGURACION */

        Schema::create('configurations', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('dominio');
            $table->string('keywords');
            $table->string('descripcion');
            $table->text('google_analytics');
            $table->string('icon');

            $table->timestamps();
        });

        Schema::create('sliders', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo');
            $table->string('enlace');
            $table->string('imagen');
            $table->string('imagen_carpeta');
            $table->integer('orden');

            $table->boolean('publicar')->default(false);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps(); //created_at, update_at
            $table->softDeletes(); //deleted_at
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('menus');
        Schema::drop('menu_categories');
        Schema::drop('configurations');
        Schema::drop('sliders');
        Schema::drop('users');
	}

}
