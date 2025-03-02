<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materia;
use App\Models\Grupo;
use App\Models\GrupoUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class cargaDocMatController extends Controller
{
    public function cargaDocMat(Request $request)
    {
        $query = User::query();

        // Filtrar por nombre y apellido
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('nombres', 'like', '%' . $searchTerm . '%')
                  ->orWhere('apellidos', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filtrar por correo
        if ($request->has('correo') && !empty($request->correo)) {
            $query->where('correo', $request->correo);
        }

        // Filtrar por rol
        if ($request->has('rol') && !empty($request->rol)) {
            $query->where('rol', $request->rol);
        }

        // Obtener los usuarios según los filtros
        $users = $query->get();

        // Si se seleccionó un docente para asignar grupo
        $teacher = null;
        $materias = null;
        if ($request->has('teacher_rpe') && !empty($request->teacher_rpe)) {
            $teacher = User::where('rpe', $request->teacher_rpe)->first();
            if ($teacher && $teacher->rol === 'docente') {
                $materias = Materia::all();
            } else {
                $teacher = null;
            }
        }

        return view('cargaDocMat', compact('users', 'teacher', 'materias'));
    }

    public function asignarGrupo(Request $request)
    {
        $validated = $request->validate([
            'id_grupo'      => 'required|numeric|unique:grupos,id_grupo',
            'teacher_rpe'   => 'required|exists:users,rpe',
            'nombre_grupo'  => 'required|string|max:255',
            'horario'       => 'required|string|max:255',
            'capacidad'     => 'required|integer',
            'fk_id_materia' => 'required|exists:materias,id_clave',
        ]);

        // Crear el grupo usando el id proporcionado manualmente
        $grupo = Grupo::create([
            'id_grupo'      => $validated['id_grupo'],
            'fk_id_materia' => $validated['fk_id_materia'],
            'nombre_grupo'  => $validated['nombre_grupo'],
            'horario'       => $validated['horario'],
            'capacidad'     => $validated['capacidad'],
        ]);

        // Registrar la relación en la tabla pivote grupo_usuario
        GrupoUsuario::create([
            'fk_clave_maestro' => $validated['teacher_rpe'],
            'fk_id_grupo'      => $grupo->id_grupo,
            'fecha_inscripcion'=> Carbon::now()->format('Y-m-d'),
            'estado'           => 'activo',
        ]);

        return redirect()->route('home.cargaDocMat')
                         ->with('success', 'Grupo asignado correctamente.');
    }
}
