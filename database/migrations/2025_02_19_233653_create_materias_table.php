<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Tabla de Materias
        Schema::create('materias', function (Blueprint $table) {
            $table->id('id_clave'); 
            $table->string('nombre', 255);
            $table->integer('creditos');
            $table->string('carrera')->nullable();
            $table->integer('total_horas');
            $table->integer('horas_teoria');
            $table->integer('horas_practica');
            $table->integer('horas_autonomas');
            $table->timestamps();
        });

        // Tabla de Temas
        Schema::create('temas', function (Blueprint $table) {
            $table->id('id_tema');
            $table->unsignedBigInteger('fk_clave'); 
            $table->integer('n_tema');
            $table->integer('horas_tema');
            $table->string('tema', 255);
            $table->timestamps();
        
            $table->foreign('fk_clave')->references('id_clave')->on('materias')->onDelete('cascade');
        });

        // Tabla de Subtemas
        Schema::create('subtemas', function (Blueprint $table) {
            $table->id('id_n_sub');
            $table->unsignedBigInteger('fk_id_tema');
            $table->string('subtema', 255);
            $table->timestamps();

            $table->foreign('fk_id_tema')->references('id_tema')->on('temas')->onDelete('cascade');
        });

        // Tabla de Grupos
        Schema::create('grupos', function (Blueprint $table) {
            $table->id('id_grupo');
            $table->unsignedBigInteger('fk_id_materia'); 
            $table->string('nombre_grupo');
            $table->string('horario');
            $table->integer('capacidad');
            $table->timestamps();

            // Establecer la clave foránea
            $table->foreign('fk_id_materia')->references('id_clave')->on('materias')->onDelete('cascade');
        });
        // Tabla de Bitácora
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id('id_bitacora');
            $table->unsignedBigInteger('id_usuario');
            $table->string('accion');
            $table->dateTime('fecha_hora');
            $table->unsignedBigInteger('id_recurso')->nullable();
            $table->string('tipo_recurso')->nullable();
            $table->text('detalles');
            $table->timestamps();
            
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Tabla de Grupo-Usuario
        Schema::create('grupo_usuario', function (Blueprint $table) {
            $table->id('id_usuario_grupo');
            $table->unsignedBigInteger('fk_clave_maestro');
            $table->unsignedBigInteger('fk_id_grupo');
            $table->date('fecha_inscripcion');
            $table->string('estado');
            $table->timestamps();
            
            $table->foreign('fk_id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            $table->foreign('fk_clave_maestro')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Tabla de Carpetas
        Schema::create('carpetas', function (Blueprint $table) {
            $table->id('id_carpeta');
            $table->unsignedBigInteger('id_grupo');
            $table->string('nombre_carpeta');
            $table->date('fecha_creacion');
            $table->text('descripcion');
            $table->timestamps();
            
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
        });

        // Tabla de Archivos
        Schema::create('archivos', function (Blueprint $table) {
            $table->id('id_archivo');
            $table->unsignedBigInteger('id_carpeta');
            $table->string('nombre_archivo');
            $table->string('ruta_archivo');
            $table->integer('tamano');
            $table->date('fecha_subida');
            $table->string('tipo_archivo');
            $table->timestamps();
            
            $table->foreign('id_carpeta')->references('id_carpeta')->on('carpetas')->onDelete('cascade');
        });
        
        // Tabla de Sesiones
        Schema::create('sesiones', function (Blueprint $table) {
            $table->id('id_sesion');
            $table->unsignedBigInteger('id_grupo');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('titulo_actividad');
            $table->string('tema');
            $table->string('subtema');
            $table->text('actividades');
            $table->string('enlaces')->nullable();
            $table->boolean('archivo')->default(false);
            $table->string('estado');
            $table->timestamps();
            
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
        });

        // Tabla de Incidencias
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id('id_incidencia');
            $table->unsignedBigInteger('id_sesion');
            $table->unsignedBigInteger('id_usuario');
            $table->string('tipo');
            $table->string('titulo');
            $table->text('descripcion');
            $table->dateTime('fecha_hora');
            $table->string('estado');
            $table->string('prioridad');
            $table->timestamps();
            
            $table->foreign('id_sesion')->references('id_sesion')->on('sesiones')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Tabla de Grupo-Carpeta
        Schema::create('grupo_carpeta', function (Blueprint $table) {
            $table->id('id_grupo_carpeta');
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_carpeta');
            $table->string('permisos')->nullable();
            $table->timestamps();
    
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            $table->foreign('id_carpeta')->references('id_carpeta')->on('carpetas')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('incidencias');
        Schema::dropIfExists('sesiones');
        Schema::dropIfExists('archivos');
        Schema::dropIfExists('carpetas');
        Schema::dropIfExists('grupo_usuario');
        Schema::dropIfExists('bitacora');
        Schema::dropIfExists('grupo_carpeta');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('subtemas');
        Schema::dropIfExists('temas');
        Schema::dropIfExists('materias');
    }
};
