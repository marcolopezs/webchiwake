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