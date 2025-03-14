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
use App\Http\Controllers\UserController;

Route::get('/', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/home/perfil', [PerfilController::class, 'perfil'])->name('home.perfil');

    Route::get('/home/materias', [materiaController::class, 'materias'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias');
    Route::get('/home/materias/calendario', [calendarioController::class, 'calendario'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario');

    Route::get('/home/cargaDocMat', [cargaDocMatController::class, 'cargaDocMat'])
            ->middleware('checkRole:admin')
            ->name('home.cargaDocMat');

    Route::get('/home/bitacora', [BitacoraController::class, 'bitacora'])
            ->middleware('checkRole:admin,coordinador_ISI,coordinador_COMP')
            ->name('home.bitacora');

    Route::get('/home/materias/calendario/sesion', [sesionController::class, 'sesion'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario.sesion');
    Route::get('/home/materias/calendario/carpeta', [carpetaController::class, 'carpeta'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario.carpeta');
    Route::get('/home/materias/calendario/sesion/incidencia', [incidenciaController::class, 'incidencia'])
            ->middleware('checkRole:admin,docente')
            ->name('home.materias.calendario.sesion.incidencia');

    Route::get('/home/programa/cargaPrograma', [cargaProgramaController::class, 'cargaP'])
            ->middleware('checkRole:admin,becario')
            ->name('home.programa.cargaPrograma');
    Route::post('/home/programa/guardarMateria', [CargaProgramaController::class, 'guardarMateria'])
            ->middleware('checkRole:admin,becario')
            ->name('home.programa.guardarMateria');
    Route::get('/home/programa', [ProgramaDeEstudioController::class, 'programa'])
            ->middleware('checkRole:admin,becario')
            ->name('home.programa');

    Route::get('/home/usuarios', [UserController::class, 'muestraUsarios'])
            ->middleware('checkRole:admin')
            ->name('home.usuarios');
    Route::get('eliminarUser/{rpe}', [UserController::class, 'eliminaUsuario'])->name('usuario.eliminar');
    Route::post('editarUsuario/{rpe}', [UserController::class, 'editaUsuario'])-> name('usuario.editar');
    Route::post('agregaUsuario', [UserController::class, 'agregaUsuario'])-> name('usuario.agregar');
});

Route::post('/home/materias/calendario/sesion', [sesionController::class, 'store'])
        ->name('home.materias.calendario.sesion.store');

// Ruta para procesar el formulario de asignación de grupo
Route::post('/home/asignar-grupo', [cargaDocMatController::class, 'asignarGrupoStore'])
        ->middleware('checkRole:admin')
        ->name('home.asignarGrupo.store');

// Nueva ruta para mostrar la vista de asignación de grupo
Route::get('/asignar-grupo/{teacher_rpe}', [cargaDocMatController::class, 'asignarGrupo'])
        ->middleware('checkRole:admin')
        ->name('asignarGrupo');
