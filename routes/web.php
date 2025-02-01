<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/home', [HomeController::class, 'index']);

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');