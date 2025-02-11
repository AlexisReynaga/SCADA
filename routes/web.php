<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\materiaController;
use App\Http\Controllers\AltaMatController;
use App\Http\Controllers\RegistroEvidenciasController;
use App\Http\Controllers\BitacoraController;
use App\Http\Middleware\CheckRole;


// Ruta de login (formulario)
Route::get('/', [loginController::class, 'login'])->name('login');

// Ruta para procesar el login
Route::post('/login', [loginController::class, 'authenticate'])->name('login.process');

// Ruta para cerrar sesión
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');
    Route::get('/materias', [materiaController::class, 'materias'])->name('materias');
    Route::get('/altaMat', [AltaMatController::class, 'altaMat'])->name('altaMat');
    Route::get('/registroEvidencias', [RegistroEvidenciasController::class, 'registroEvidencias'])->name('registroEv');
    Route::get('/bitacora', function () {
        return view('bitacora');
    })->middleware('checkRole:admin')->name('bitacora');
    
    
});
