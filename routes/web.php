<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\materiaController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\calendarioController;
use App\Http\Controllers\sesionController;
use App\Http\Controllers\carpetaController;
use App\Http\Controllers\incidenciaController;
use App\Http\Controllers\ProgramaDeEstudioController;
use App\Http\Controllers\cargaProgramaController;
use App\Http\Controllers\cargaDocMatController;

// Ruta de todas las páginas web
Route::get('/', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Ruta para mostrar el perfil: home/perfil en vez de perfil
    Route::get('/home/perfil', [PerfilController::class, 'perfil'])->name('home.perfil');

    // Rutas y accesos para el docente y administrador
    Route::get('/home/materias', [materiaController::class, 'materias'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias');
    Route::get('/home/materias/calendario', [calendarioController::class, 'calendario'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario');

    // Ruta disponible únicamente para el rol de admin
    Route::get('/home/cargaDocMat', [cargaDocMatController::class, 'cargaDocMat'])
            ->middleware('checkRole:admin')
            ->name('home.cargaDocMat');

    // Ruta disponible únicamente para los roles de admin, coordinadores, jefe de área
    Route::get('/home/bitacora', [BitacoraController::class, 'bitacora'])
            ->middleware('checkRole:admin,coordinador_ISI,coordinador_COMP')
            ->name('home.bitacora');

    // Rutas y accesos para el docente y administrador
    Route::get('/home/materias/calendario/sesion', [sesionController::class, 'sesion'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario.sesion');
    Route::get('/home/materias/calendario/carpeta', [carpetaController::class, 'carpeta'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario.carpeta');
    Route::get('/home/materias/calendario/sesion/incidencia', [incidenciaController::class, 'incidencia'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario.sesion.incidencia');

//ruta para ver los programas de estudio, solo lo vera el becario
Route::get('/home/programa/cargaPrograma', [cargaProgramaController::class, 'cargaP'])
        ->middleware('checkRole:admin,becario')
        ->name('home.programa.cargaPrograma');
// Nueva ruta para procesar el formulario
Route::post('/home/programa/guardarMateria', [CargaProgramaController::class, 'guardarMateria'])
    ->middleware('checkRole:admin,becario')
    ->name('home.programa.guardarMateria');
Route::get('/home/programa', [ProgramaDeEstudioController::class, 'programa'])
        ->middleware('checkRole:admin,becario')
        ->name('home.programa');

});

Route::post('/home/materias/calendario/sesion', [sesionController::class, 'store'])
        ->name('home.materias.calendario.sesion.store');
