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
//ruta de todas las paginas web
Route::get('/', [loginController::class, 'login']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');
Route::get('/materias', [materiaController::class, 'materias'])->name('materias');
Route::get('/altaMat', [AltaMatController::class, 'altaMat'])->name('altaMat');
Route::get('/registroEvidencias', [RegistroEvidenciasController::class, 'registroEvidencias'])->name('registroEv');
Route::get('/bitacora', [BitacoraController::class, 'bitacora'])->name('bitacora');
Route::get('/calendario', [calendarioController::class, 'calendario'])->name('calendario');
Route::get('/sesion', [sesionController::class, 'sesion'])->name('sesion');