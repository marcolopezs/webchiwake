<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* FRONTEND */

Route::get('/', ['as' => 'front.home', 'uses' => 'FrontendController@home']);
Route::get('nosotros', ['as' => 'front.nosotros', 'uses' => 'FrontendController@nosotros']);
Route::get('menu', ['as' => 'front.menu', 'uses' => 'FrontendController@menu']);
Route::get('reservacion', ['as' => 'front.reservacion', 'uses' => 'FrontendController@reservacion']);
Route::get('contacto', ['as' => 'front.contacto', 'uses' => 'FrontendController@contacto']);

/* FORMULARIOS */
Route::post('reservacion', ['as' => 'front.reservacion.form', 'uses' => 'FrontendController@reservacionForm']);
Route::post('contacto', ['as' => 'front.contacto.form', 'uses' => 'FrontendController@contactoForm']);

/* IMAGENES */
Route::get('/upload/{folder}/{width}x{height}/{image}', function($folder, $width, $height, $image)
{
    $file = public_path() . '/upload/' . $folder . '/' .$image;
    App::make('phpthumb')->create('resize', array($file, $width, $height, 'adaptive'))->show();
});

/* ADMINISTRADOR */

//SI EL USUARIO ESTA CONECTADO NO MOSTRAR
Route::group(['before' => 'guest'], function () {

    /* LOGIN */
    Route::get('administrador/login', ['as' => 'administrador.login.show', 'uses' => 'AuthController@show']);
    Route::post('administrador/login', ['as' => 'administrador.login', 'uses' => 'AuthController@login']);

});

//SI EL USUARIO ESTA CONECTADO MOSTRAR
Route::group(['before' => 'auth'], function () {

    //NOSOTROS
    Route::get('administrador/about/nosotros', ['as' => 'administrador.about.nosotros', 'uses' => 'AdminAboutController@nosotros']);
    Route::put('administrador/about/nosotros', ['as' => 'administrador.about.nosotrosUpdate', 'uses' => 'AdminAboutController@nosotrosUpdate']);
    Route::get('administrador/about/misvis', ['as' => 'administrador.about.misvis', 'uses' => 'AdminAboutController@misvis']);
    Route::put('administrador/about/misvis', ['as' => 'administrador.about.misvisUpdate', 'uses' => 'AdminAboutController@misvisUpdate']);
    
    //STAFF
    Route::resource('administrador/staff', 'AdminStaffController');
    Route::get('administrador/staff-order', ['as' => 'administrador.staff.order', 'uses' => 'AdminStaffController@order']);
    Route::post('administrador/staff-order/order', ['as' => 'administrador.staff.orderForm', 'uses' => 'AdminStaffController@orderForm' ]);

    //MENUS
    Route::get('administrador/menus/{category}', ['as' => 'administrador.menus.index', 'uses' => 'AdminMenusController@index']);
    Route::get('administrador/menus/{category}/create', ['as' => 'administrador.menus.create', 'uses' => 'AdminMenusController@create']);
    Route::post('administrador/menus/{category}', ['as' => 'administrador.menus.store', 'uses' => 'AdminMenusController@store']);
    Route::get('administrador/menus/{category}/{menus}', ['as' => 'administrador.menus.show', 'uses' => 'AdminMenusController@show']);
    Route::get('administrador/menus/{category}/edit/{menus}', ['as' => 'administrador.menus.edit', 'uses' => 'AdminMenusController@edit']);
    Route::put('administrador/menus/{category}/{menus}', ['as' => 'administrador.menus.update', 'uses' => 'AdminMenusController@update']);
    Route::delete('administrador/menus/{category}/{menus}', ['as' => 'administrador.menus.destroy', 'uses' => 'AdminMenusController@destroy']);

    //CATEGORIAS DE MENUS
    Route::resource('administrador/menus_categories', 'AdminMenuCategoriesController');
    Route::get('administrador/menus_categories-order', ['as' => 'administrador.menus_categories.order', 'uses' => 'AdminMenuCategoriesController@order']);
    Route::post('administrador/menus_categories-order/order', ['as' => 'administrador.menus_categories.orderForm', 'uses' => 'AdminMenuCategoriesController@orderForm' ]);

    //FRASES
    Route::resource('administrador/phrases', 'AdminPhrasesController');

    //SLIDERS
    Route::resource('administrador/slider', 'AdminSlidersController');

    //CONFIGURACIÓN
    Route::resource('administrador/config', 'AdminConfigsController');

    //USUARIO
    Route::resource('administrador/users', 'AdminUsersController');
    Route::get('administrador/profile', ['as' => 'administrador.users.profile', 'uses' => 'AdminUsersController@profile' ]);
    Route::post('administrador/profile/password', ['as' => 'administrador.users.profilePassword', 'uses' => 'AdminUsersController@profileChangePassword' ]);

    //ADMIN
    Route::get('administrador', ['as' => 'administrador.index', 'uses' => 'AdminController@show']);
    Route::get('administrador/logout', ['as' => 'administrador.logout', 'uses' => 'AuthController@logout']);

});