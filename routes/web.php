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

//Route::middleware('guest')->get('/', function () {
Route::get('/', function () {
    return view('welcome    ');
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
Route::middleware('auth')->resource('eventos','evento\Admin_Eventos');
//Route::middleware('auth')->resource('lugares','lugar\Admin_Lugares');


Route::middleware('AdminMiddleware:admin lugares')->get('lugares','lugar\Admin_Lugares@index') -> name('lugares.index');
Route::middleware('AdminMiddleware:crear lugares')->get('lugares/{id}/edit','lugar\Admin_Lugares@edit')-> name('lugares.edit');
Route::middleware('AdminMiddleware:crear lugares')->put('lugares/{id}/edit','lugar\Admin_Lugares@update')-> name('lugares.update');
Route::middleware('AdminMiddleware:crear lugares')->post('lugares/{id}/edit','lugar\Admin_Lugares@update')-> name('lugares.update');
Route::middleware('AdminMiddleware:editar lugares')->get('lugares/create','lugar\Admin_Lugares@create')-> name('lugares.create');
Route::middleware('AdminMiddleware:editar lugares')->put('lugares/create','lugar\Admin_Lugares@store') -> name('lugares.store');
Route::middleware('AdminMiddleware:editar lugares')->post('lugares/create','lugar\Admin_Lugares@store') -> name('lugares.store');
Route::middleware('AdminMiddleware:borrar lugares')->delete('lugares/{id}/destroy','lugar\Admin_Lugares@destroy') -> name('lugares.destroy');
Route::middleware('AdminMiddleware:borrar lugares')->get('lugares/{id}/destroy','lugar\Admin_Lugares@index') -> name('lugares.destroy');
Route::middleware('AdminMiddleware:admin lugares')->get('lugares/{id}','lugar\Admin_Lugares@show') -> name('lugares.show');



Route::get('tiquetes/tiquetes','tiquetes\Admin_Tiquetes@index') -> name('Tiquetes');





Route::get('lugares/create/sector','sector\Admin_Sector@create')-> name('sector.create');
Route::put('lugares/create/sector','sector\Admin_Sector@store') -> name('sector.store');
Route::post('lugares/create/sector','sector\Admin_Sector@store') -> name('sector.store');

Route::view('/welcome','welcome');
Route::resource('adminregistro','Registro_admin\Admin_registro');

Route::get('eventos/{evento}/{precios}/reservar', 'tiquetes\Admin_Tiquetes@reservar')-> name('tiquetes.reservar');
Route::get('reservar_tiquete/{evento}/{id}', 'tiquetes\Admin_Tiquetes@mostrar_reserva')-> name('tiquetes.mostrar_reserva');
Route::get('recibo{id}', 'tiquetes\Admin_Tiquetes@mostrar_pago')-> name('tiquetes.mostrar_recibo');
Route::put('cancelar{id}', 'tiquetes\Admin_Tiquetes@cancelar')-> name('tiquetes.cancelar');
Route::post('cancelar{id}', 'tiquetes\Admin_Tiquetes@cancelar')-> name('tiquetes.cancelar');

Route::get('pago/{id}', 'tiquetes\Admin_Tiquetes@reservar')-> name('tiquetes.mostrar_pago');
Route::put('pago/{id}', 'tiquetes\Admin_Tiquetes@mostrar_pago')-> name('tiquetes.mostrar_pago');
Route::post('pago/{id}', 'tiquetes\Admin_Tiquetes@mostrar_pago')-> name('tiquetes.mostrar_pago');
Route::get('pagar/{id}', 'tiquetes\Admin_Tiquetes@reservar')-> name('tiquetes.pagar');
Route::put('pagar/{id}','tiquetes\Admin_Tiquetes@pagar') -> name('tiquete.pagar');
Route::post('pagar/{id}','tiquetes\Admin_Tiquetes@pagar') -> name('tiquete.pagar');
Route::resource('tiquetes','tiquetes\Admin_Tiquetes');





#Route::get('/', 'HomeController@index')->name('home');
