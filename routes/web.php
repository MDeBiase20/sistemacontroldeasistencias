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

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Auth::routes(['register'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
Route::get('/asistencias/reportes', [App\Http\Controllers\AsistenciaController::class, 'reportes'])->name('reportes');
Route::get('/asistencias/pdf', [App\Http\Controllers\AsistenciaController::class, 'pdf'])->name('pdf');
Route::get('/asistencias/pdf_fechas', [App\Http\Controllers\AsistenciaController::class, 'pdf_fechas'])->name('pdf_fechas');

//otra forma de habilitar la rutra de miembros

//habilitación de las rutas
Route::resource(name: '/miembros', controller: \App\Http\Controllers\MiembroController::class)->middleware('can:miembros');
Route::resource(name: '/ministerios', controller: \App\Http\Controllers\MinisterioController::class)->middleware('can:ministerios');
Route::resource(name: '/usuarios', controller: \App\Http\Controllers\UserController::class)->middleware('can:usuarios');
Route::resource(name: '/asistencias', controller: \App\Http\Controllers\AsistenciaController::class);


// Acá habilito la ruta de miembros
// Route::get('miembros', function () {
//     return view('miembros.index');
// })->middleware('auth'); 

// Route::get('miembros/create', function () {
//     return view('miembros.create');
// })->middleware('auth'); 

