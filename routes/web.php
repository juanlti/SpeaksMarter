<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
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
//RUTAS

// SIN AUTENTICACION
// (HOME)
Route::get('/',[DashboardController::class,'index'])->name('index');


// CON AUTENTICACION
Route::middleware([
    //METODO DE AUTENTICACION: "SANCTUM"
    'auth:sanctum', // CONFIGURACION DE AUTENTICACION: "auth_session" DE "JETSTREAM"
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // GROUP , CONJUUNTO DE RUTAS + COMPONENTES PARA LOS USUARIOS QUE PREVIAMENTE FUERON VERIFICADOS

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

});

