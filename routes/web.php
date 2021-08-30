<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AdicionalEventoController;
use App\Http\Controllers\PanelistaController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\VmaterialController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\TurismoController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GaleriaUserController;
use App\Http\Controllers\FitnessController;
use App\Http\Controllers\BuscaEventoController;
use App\Http\Controllers\AdminUsersController;

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

Route::get('admin', function () {
    return view('admin.administrador');
})->middleware(['auth:sanctum', 'verified'])->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//rutas home
Route::get('/clima', 'App\Http\Controllers\ClimaController@index')->middleware('auth');
Route::get('/documentos', 'App\Http\Controllers\DocumentosController@index')->middleware('auth');
Route::get('/documentos/detalle/{id}', 'App\Http\Controllers\DocumentosController@show')->name('detalle.documento')->middleware('auth');
Route::get('/eventos', 'App\Http\Controllers\EventosUController@index')->middleware('auth');
Route::get('/eventos/detalle/{id}', 'App\Http\Controllers\EventosUController@show')->name('detalle.evento')->middleware('auth');
Route::get('/eventos/panelistas/{id}', 'App\Http\Controllers\EventosUController@panelistas')->name('detalle.panelistas-evento')->middleware('auth');
Route::get('/eventos/panelista/{id}', 'App\Http\Controllers\EventosUController@panelista')->name('detalle.panelista')->middleware('auth');
Route::get('/eventos/usuarios/{id}', 'App\Http\Controllers\EventosUController@usuarios')->name('detalle.usuarios-evento')->middleware('auth');
Route::get('/eventos/materiales/{id}', 'App\Http\Controllers\EventosUController@materiales')->name('detalle.materiales')->middleware('auth');
Route::get('/eventos/documento/detalle/{id}', 'App\Http\Controllers\EventosUController@materialesdetalle')->name('detalle.documento-evento')->middleware('auth');
Route::get('/eventos/programacion/{id}', 'App\Http\Controllers\EventosUController@programacion')->name('detalle.programacion-detalle')->middleware('auth');
Route::get('/actividades/panelistas/{id}', 'App\Http\Controllers\EventosUController@actividadpanelistas')->name('detalle.panelistas-actividad')->middleware('auth');
Route::get('/actividades/materiales/{id}', 'App\Http\Controllers\EventosUController@actividadmateriales')->name('detalle.materiales-actividad')->middleware('auth');
Route::get('/actividades/documento/detalle/{id}', 'App\Http\Controllers\EventosUController@actividadmaterialesdetalle')->name('detalle.documento-actividad')->middleware('auth');
Route::get('/programacion', 'App\Http\Controllers\ProgramacionController@index')->middleware('auth');
Route::get('/videos', 'App\Http\Controllers\VideosUserController@index');
Route::get('/turismo', 'App\Http\Controllers\TurismoUserController@index');
Route::get('/detalle/turismo/{id}', 'App\Http\Controllers\TurismoUserController@show')->name('detalle.turismo')->middleware('auth');
Route::get('/faq', 'App\Http\Controllers\FaqUserController@index');
Route::get('/galeria', [GaleriaUserController::class, 'index'])->middleware('auth');
Route::post('/galeria', [GaleriaUserController::class, 'store'])->middleware('auth');
Route::get('/fitness', 'App\Http\Controllers\FitnessUserController@index')->name('fitness');
Route::get('/fitness/guardar/{id}', 'App\Http\Controllers\FitnessUserController@show')->name('fitness.guardar')->middleware('auth');
Route::post('/fitness/posicion', 'App\Http\Controllers\FitnessUserController@store')->middleware('auth');
Route::get('/fitness/finalizar', 'App\Http\Controllers\FitnessUserController@fitness_points')->name('fitness.finalizar')->middleware('auth');
Route::post('/fitness/terminar', 'App\Http\Controllers\FitnessUserController@update')->middleware('auth');


//Admin
Route::resource('admin/eventos', EventoController ::class)->middleware('auth');
Route::get('admin/ajustes',function(){
    return view('admin.ajustes');
})->middleware('auth');
Route::get('admin/estadisticas',function(){
    return view('admin.estadisticas');
})->middleware('auth');


Route::resource('admin/panelistas', PanelistaController ::class)->middleware('auth');
Route::resource('admin/actividades', ActividadController ::class)->middleware('auth');
Route::resource('admin/material', MaterialController ::class)->middleware('auth');
Route::resource('admin/vmaterial', VmaterialController ::class)->middleware('auth');
Route::resource('admin/videos', VideosController ::class)->middleware('auth');
Route::resource('admin/turismo', TurismoController::class)->middleware('auth');
Route::resource('admin/faq', FaqController::class)->middleware('auth');
Route::resource('admin/fitness', FitnessController ::class)->middleware('auth');
Route::resource('admin/adminusers', AdminUsersController ::class)->middleware('auth');



Route::post('admin/eventos/add','App\Http\Controllers\AdicionalEventoController@storeUpdate')->name('admin/eventos/add');

Route::post('admin/panelistaevento/add','App\Http\Controllers\AdicionalEventoController@eventopost')->name('admin/panelistaevento/add');
Route::post('admin/panelistaactividad/add','App\Http\Controllers\AdicionalEventoController@actividadpost')->name('admin/panelistaactividad/add');
Route::post('admin/materialevento/add','App\Http\Controllers\AdicionalEventoController@materialeventopost')->name('admin/materialevento/add');
Route::post('admin/materialactividad/add','App\Http\Controllers\AdicionalEventoController@materialactividadpost')->name('admin/materialactividad/add');

Route::get('admin/panelistaevento/add','App\Http\Controllers\AdicionalEventoController@evento')->name('admin/panelistaevento/add');
Route::get('admin/panelistaevento/autocomplete', 'App\Http\Controllers\AdicionalEventoController@autocomplete')->name('admin/panelistaevento/autocomplete');
Route::get('admin/panelistaactividad/add','App\Http\Controllers\AdicionalEventoController@actividad')->name('admin/panelistaactividad/add');
Route::get('admin/materialevento/add','App\Http\Controllers\AdicionalEventoController@materialevento')->name('admin/materialevento/add');
Route::get('admin/materialactividad/add','App\Http\Controllers\AdicionalEventoController@materialactividad')->name('admin/materialactividad/add');
Route::get('admin/panelistasevento/show/{id}','App\Http\Controllers\AdicionalEventoController@panelistashow')->name('admin/panelistasevento/show');
Route::get('admin/participantesevento/show/{id}','App\Http\Controllers\AdicionalEventoController@participanteshow')->name('admin/participantesevento/show');
Route::get('admin/panelistasactividad/show/{id}','App\Http\Controllers\AdicionalEventoController@panelistashowactividad')->name('admin/panelistasactividad/show');
Route::get('admin/programacion/show/{id}','App\Http\Controllers\AdicionalEventoController@programacionshow')->name('admin/panelistasevento/show');
Route::get('admin/materialevento/show/{id}','App\Http\Controllers\AdicionalEventoController@materialshow')->name('admin/materialevento/show');
Route::get('admin/materialactividad/show/{id}','App\Http\Controllers\AdicionalEventoController@materialactividadshow')->name('admin/materialactividad/show');

//Usuarios
Route::get('/users/import', 'App\Http\Controllers\UsersImportController@show' );
Route::post('/users/import', 'App\Http\Controllers\UsersImportController@store' );
Route::get('/users/evento', 'App\Http\Controllers\UsersImportController@showeventos' );
Route::post('/users/evento', 'App\Http\Controllers\UsersImportController@eventostore' );

Route::get('autocomplete-search', [BuscaEventoController::class, 'autocompleteSearch']);
Route::get('autocomplete-search-panel', [BuscaEventoController::class, 'autocompleteSearchPanel']);
Route::get('autocomplete-search-ac', [BuscaEventoController::class, 'autocompleteSearchAc']);
Route::get('test', [BuscaEventoController::class, 'index']);


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail de Be-Andes',
        'body' => 'Correo de notificaciones'
    ];
   
    \Mail::to('daherrerac@gmail.com')->send(new \App\Mail\MyMail($details));
   
    dd("Email is Sent.");
});