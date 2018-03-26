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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/principal', function () {
    return view('paginaprincipal');
});

Route::get('/taller', function () {
    return view('taller');
});
Route::get('/visita', function () {
    return view('visita');
});
Route::get('/cultura', function () {
    return view('cultura');
});
Route::get('/comida', function () {
    return view('comida');
});

Route::get('/Login',function(){
    return view('login');
});
Route::group(['prefix'=>'admin', 'as'=>'admin.'],function(){
  Route::get('/',function(){return "yeah";});
  Route::get('/usuarios','usuarioscontroller@index')->name('usuarios');
  Route::get('/archivos','archivoscontroller@index')->name('archivos');
  Route::get('/centrosalud','Centro_saludcontroller@index')->name('centrosalud');
  Route::get('/datospersonales','datospersonalescontroller@index')->name('datospersonales');
  // Estos son los Routes de los DASH
  Route::get('/dash','dashcontroller@index')->name('dash');
  Route::get('/benef','dashcontroller@benef')->name('benef');
  Route::get('/registrados','regiscontroller@index')->name('registrados');
  Route::get('/graficos','regiscontroller@graficos')->name('graficos');
  Route::resource('dash','dashcontroller');
  Route::resource('beneficiarios','dashcontroller');
  Route::resource('registrados','regiscontroller');
  Route::resource('Graficos','regiscontroller');

  Route::resource('usuarios','usuarioscontroller');
  Route::resource('archivos','archivoscontroller');
  Route::resource('centrosalud','Centro_Saludcontroller');
  Route::resource('datospersonales','datospersonalescontroller');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
