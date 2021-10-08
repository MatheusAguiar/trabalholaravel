<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\AgendamentoController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\AgendaController;
use App\Http\Controllers\Admin\FotoController;

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

Route::prefix('admin')->group(function(){

    Route::resource('usuarios',UsuarioController::class)->except(['show']);
    Route::resource('agendamentos',AgendamentoController::class);
    Route::resource('usuarios.fotos',FotoController::class)->except(['show','edit','update']);
    
});

Route::resource('/', UserController::class)->only('index');
Route::resource('usuarios.agendamentos', AgendaController::class)->only(['index','show']);
