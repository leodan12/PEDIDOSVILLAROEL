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

//para loguearse


Route::post('/', 'UserController@login')->name('user.login1'); 
Route::get('/integrantes','UserController@integrantes')->name('user.integrantes');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//rutas generales

Route::resource('perfil','PerfilController');
Route::resource('usuario','UserController');

Route::resource('ordencompra','OrdenCompraController');
Route::resource('detallepedido','DetallepedidoController');

Route::resource('asistencia','AsistenciaController');


/*
Route::resource('empresa','EmpresaController');
Route::resource('ofertalaboral','OfertalaboralController');
Route::resource('experiencialaboral','ExperiencialaboralController');
Route::resource('publicacion','PublicacionController');
Route::resource('encuesta','EncuestaController');
Route::resource('pregunta','PreguntaController');
Route::resource('respuesta', 'RespuestaController');*/


//para entrar con diferente perfil

Route::get('/administrador', 'PerfilController@administrador');
Route::get('/empleado', 'PerfilController@empleado');
Route::get('/gerente', 'PerfilController@gerente');
 



//rutas index  

Route::get('/users', 'UserController@index');
Route::get('/perfiles', 'PerfilController@index');
Route::get('/asistencia', 'AsistenciaController@index')->name('asistencia');

Route::get('/ordencompra', 'OrdenCompraController@index')->name('ordencompra');
 
Route::get('/detallededido/{id}','DetallepedidoController@edit')->name('detallededido');
Route::get('/agregarpedido/{id}','DetallepedidoController@create')->name('agregarpedido');

Route::post('/guardardetalle', 'OrdenCompraController@store')->name('guardardetalle');

//rutas de metodos adicionales
 
//Route::get('/Responderpreguntas/{id}','RespuestaController@crear')->name('responderpreguntas');


// cancelaciones 
Route::get('cancelarPerfil', function () {
    return redirect()->route('perfil.index')->with('datos','Accion cancelada..!');
})->name('cancelarPerfil');  //le damos nombre a la ruta

Route::get('cancelarUsuario', function () {
    return redirect()->route('usuario.index')->with('datos','Accion cancelada..!');
})->name('cancelarUsuario');  //le damos nombre a la ruta

Route::get('cancelarOrden', function () {
    return redirect()->route('ordencompra')->with('datos','Accion cancelada..!');
})->name('cancelarOrden');  //le damos nombre a la ruta

Route::get('cancelarAsistencia', function () {
    return redirect()->route('asistencia')->with('datos','Accion cancelada..!');
})->name('cancelarAsistencia');  //le damos nombre a la ruta





//rutas usadas por javascript
Route::Get('/usuarioslista', 'UserController@usuarios');