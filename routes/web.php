<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PerfilController;
//ruta de todas las paginas web
Route::get('/', [loginController::class, 'login']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');