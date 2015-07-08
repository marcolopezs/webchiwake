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
    $file = base_path() . '/public/upload/' . $folder . '/' .$image;
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

    //STAFF
    Route::resource('administrador/staff', 'AdminStaffController');

    //PAGINAS
    Route::resource('administrador/pages', 'AdminPagesController');

    //MENUS
    Route::resource('administrador/menus', 'AdminMenusController');

    //CATEGORIAS DE MENUS
    Route::resource('administrador/menus_categories', 'AdminMenuCategoriesController');

    //TAGS DE POST
    Route::resource('administrador/tags', 'AdminTagsController');

    //GALERIA DE FOTOS
    Route::resource('administrador/gallery', 'AdminGalleriesController');

    //FOTOS DE GALERIA
    Route::get('administrador/gallery/photos/{gallery}', ['as' => 'administrador.gallery.photoslist', 'uses' => 'AdminGalleriesController@photosList' ]);
    Route::get('administrador/gallery/photos/{gallery}/upload', ['as' => 'administrador.gallery.photosupload', 'uses' => 'AdminGalleriesController@photosUpload' ]);
    Route::post('administrador/gallery/photos/{gallery}/upload', ['as' => 'administrador.gallery.photosuploadsave', 'uses' => 'AdminGalleriesController@photosUploadSave' ]);

    //FRASES
    Route::resource('administrador/phrases', 'AdminPhrasesController');

    //SLIDERS
    Route::resource('administrador/slider', 'AdminSlidersController');
    //Route::post('administrador/slider/upload', ['as' => 'administrador.slider.photosuploadsave', 'uses' => 'AdminSlidersController@photosUploadSave' ]);

    //CONFIGURACIÓN
    Route::resource('administrador/config', 'AdminConfigsController');

    //MENU
    Route::resource('administrador/menu', 'AdminMenusController');
    Route::post('administrador/menu/category', ['as' => 'administrador.menu.category', 'uses' => 'AdminMenusController@category' ]);
    Route::post('administrador/menu/page', ['as' => 'administrador.menu.page', 'uses' => 'AdminMenusController@page' ]);
    Route::post('administrador/menu/link', ['as' => 'administrador.menu.link', 'uses' => 'AdminMenusController@link' ]);
    Route::post('administrador/menu/order', ['as' => 'administrador.menu.order', 'uses' => 'AdminMenusController@order' ]);

    //USUARIO
    Route::resource('administrador/users', 'AdminUsersController');
    Route::get('administrador/profile', ['as' => 'administrador.users.profile', 'uses' => 'AdminUsersController@profile' ]);
    Route::post('administrador/profile/password', ['as' => 'administrador.users.profilePassword', 'uses' => 'AdminUsersController@profileChangePassword' ]);

    //ADMIN
    Route::get('administrador', ['as' => 'administrador.index', 'uses' => 'AdminController@show']);
    Route::get('administrador/logout', ['as' => 'administrador.logout', 'uses' => 'AuthController@logout']);

});