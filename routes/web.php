<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/registrarlugar', 'lugar\registrarLugaresController@index')->name('registrarlugar');
////Route::post('/registrarlugar', 'lugar\registrarLugaresController@store');
//
//Route::post('/registrarlugar', 'lugar\registrarLugaresController@create');
//Route::post('editarlugar','lugar\registrarLugaresController@edit');
////Route::get('editarlugar','lugar\registrarLugaresController@store')->name('editarlugar');
//Route::post('editarlugar','lugar\registrarLugaresController@edit');
//Route::get('editarlugar/{id}   ','lugar\registrarLugaresController@store')->name('editarlugar');
////Route::post('borrarlugar','lugar\registrarLugaresController@destroy');
//Route::get('lugares/{id}   ','lugar\Admin_Lugares@update')->name('editarlugar');
//Route::post('/registrarlugar', 'lugar\registrarLugaresController@store');
Route::resource('eventos','evento\Admin_Eventos');
Route::resource('lugares','lugar\Admin_Lugares');
Route::view('/welcome','welcome');
Route::resource('adminregistro','Registro_admin\Admin_registro');




#Route::get('/', 'HomeController@index')->name('home');
