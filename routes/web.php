<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\materiaController;
use App\Http\Controllers\AltaMatController;
use App\Http\Controllers\RegistroEvidenciasController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\calendarioController;
use App\Http\Controllers\sesionController;
use App\Http\Controllers\carpetaController;
use App\Http\Controllers\incidenciaController;
use App\Http\Controllers\ProgramaDeEstudioController;

//ruta de todas las paginas web
Route::get('/', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
Route::get('/home', [HomeController::class, 'index'])->name('home');
//agregue la ruta para que se muestre asi: home/perfil en vez de perfil
Route::get('/home/perfil', [PerfilController::class, 'perfil'])->name('home.perfil');
    Route::get('/materias', [materiaController::class, 'materias'])->name('materias');
    Route::get('/calendario', [calendarioController::class, 'calendario'])->name('calendario');
Route::get('/altaMat', [AltaMatController::class, 'altaMat'])->name('altaMat');
Route::get('/registroEvidencias', [RegistroEvidenciasController::class, 'registroEvidencias'])->name('registroEv');
Route::get('/bitacora', [BitacoraController::class, 'bitacora'])
        ->middleware('checkRole:admin')
        ->name('bitacora');
//Route::get('/calendario', [calendarioController::class, 'calendario'])->name('calendario');
Route::get('/sesion', [sesionController::class, 'sesion'])->name('sesion');
Route::get('/carpeta', [carpetaController::class, 'carpeta'])->name('carpeta');
Route::get('/incidencia', [incidenciaController::class, 'incidencia'])->name('incidencia');

Route::get('/programa', [ProgramaDeEstudioController::class, 'programa'])
        ->middleware('checkRole:admin')
        ->name('programa');
});
