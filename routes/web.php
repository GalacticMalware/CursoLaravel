<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

//App::setLocate('es');

Route::get('job', function(){
    dispatch(new App\Jobs\SendEmail);

    return "Listo";
});


DB::listen(function($qury){
   // echo "<pre> {{$qury->sql}} </pre>";
});


Route::get('roles', function(){
    return \App\Role::with('user')->get();
});

Route::view('/',"home")->name('home');
Route::view('/contact',"contact")->name('contactos');
Route::post('contact','contacto@store');

//Route::view('/portafolio','portafolio', compact('portafolio'))->name("portafolio");
Route::view('/about','about')->name("about");

Route::resource('portafolio','Portafolio')->names('portafolio')->parameters(['portafolio'=>'project']);

Route::resource('RolesCRUD','RolesCRUD')->names('roles');

Route::get('/invitado','Invitado@index')->name('invitado');

Auth::routes(['register'=>true]);

/*Route::get('/portafolio','Portafolio@index')->name('portafolio.index');
Route::get('/portafolio/crear','Portafolio@create')->name('portafolio.create');
Route::get('/portafolio/{project}','Portafolio@show')->name('portafolio.show');
Route::post('/portafolio','Portafolio@store')->name('portafolio.store');
Route::get('/portafolio/{project}/editar','Portafolio@edit')->name('portafolio.edit');
Route::patch ('/portafolio/{project}','Portafolio@update')->name('portafolio.update');
Route::delete('/portafolio/{project}','Portafolio@destroy')->name('portafolio.destroy');
//Route::get('/portafolio','portafolio')->name('portafolio');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

*/

//Route::get('/home', 'HomeController@index')->name('home');
