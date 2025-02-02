<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AltaMatController;
use App\Http\Controllers\RegistroEvidenciasController;

//ruta de todas las paginas web
Route::get('/', [loginController::class, 'login']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');
Route::get('/altaMat', [AltaMatController::class, 'altaMat'])->name('altaMat');
Route::get('/registroEvidencias', [RegistroEvidenciasController::class, 'registroEvidencias'])->name('registroEv');