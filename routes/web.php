<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
use App\Models\assignment;
use Illuminate\Routing\Route as RoutingRoute;

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
  return view('auth.login');
});



Auth::routes();
Route::group(['middleware' => ['logout']], function () {
  Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', 'RoleController')->middleware('permission:admin@gmail.com');
    Route::resource('usuarios', 'UsuarioController')->middleware('permission:admin@gmail.com');
    Route::resource('vehiculos', 'VehiculoController')->only([
      'index', 'create', 'update', 'destroy', 'store'
    ]);
    Route::get('/vehiculos/{id}', 'VehiculoController@edit')->name('vehiculos.edit');
    Route::put('/status/{id}', 'VehiculoController@vehiculos_update')->name('vehiculos.status');

    Route::get('/vehiculos/perfil/{vehiculo}', 'VehiculoController@show')->name('vehiculo.perfil');
    Route::resource('modelos', 'ModeloController');
    Route::resource('tipos', 'TipoVehiculoController');

    //Rutas agenda
    Route::post('/home/agregar', [App\Http\Controllers\EventoController::class, 'store']);
    Route::post('/home/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
    Route::post('/home/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
    Route::post('/home/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
    Route::post('/home/eliminar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
    //Rutas indicentes
    Route::resource('incidentes', 'incidenteController');
    //Rutas Marcas
    Route::resource('marcas', 'MarcaController');
    //Ruta Gastos
    Route::resource('gastos', 'GastoController');
    //Rutas Modulo Mantenimiento
    Route::resource('servicios', 'mantenimientoController')->middleware('permission:Mecanico');
    Route::get('vehiculo/mantenimiento/{id}', 'mantenimientoController@mantenimiento')->name('mantenimiento.vehiculo');
    Route::put('manteniento/alta/{id}', 'mantenimientoController@alta_update')->name('mantenimiento.alta');
    Route::get('mantenimiento/entrega/{id}', 'mantenimientoController@alta_edit')->name('mantenimiento.entrega');
    //Ruta Conductor
    Route::resource('conductores', 'ConductorController');
    Route::put('/status/conductor/{id}', 'ConductorController@drivers_update')->name('conductores.status');
    //Ruta Proveedor
    Route::resource('proveedores', 'ProveedoresController');
    //Ruta Servicios
    Route::resource('catalogo', 'ServiceController');
    Route::get('/servicios/detallado/{service}', 'mantenimientoController@show')->name('servicio.detallado');
    //Rutas mecanicos
    Route::resource('mecanico', 'MecanicoController')->middleware('permission:Mecanico');
    //Rutas de asignaciones
    Route::resource('asignaciones', 'AssignmentController');
    Route::get('/vehiculo/asignacion/{id}', 'AssignmentController@asignacion')->name('asignacion.assignment');
    Route::get('asignacion/entrega/{id}', 'AssignmentController@entrega_edit')->name('asignacion.entrega');
    Route::put('asignacion/devolucion/{id}', 'AssignmentController@entrega_update')->name('asignacion.devolucion');
    Route::get('asignacion/archivados', 'AssignmentController@archivados_index')->name('asignacion.archivado');
  });
});
