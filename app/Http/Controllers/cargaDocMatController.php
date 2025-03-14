<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materia;
use App\Models\Grupo;
use App\Models\GrupoUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

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

        // Se elimina el envío de variables para el formulario de asignación en esta vista
        return view('cargaDocMat', compact('users'));
    }

    // Método para mostrar la vista de asignación de grupo
    public function asignarGrupo($teacher_rpe)
    {
        $teacher = User::where('rpe', $teacher_rpe)->firstOrFail();

        if($teacher->rol !== 'docente') {
            return redirect()->route('home.cargaDocMat')->with('error', 'El usuario seleccionado no es docente.');
        }

        $materias = Materia::all();

        return view('asignar_grupo', compact('teacher', 'materias'));
    }

    // Método para procesar el formulario de asignación de grupo
    public function asignarGrupoStore(Request $request)
    {
        // Genera la lista de horarios permitidos (de 7:00 am a 8:00 pm)
        $allowedHorarios = [];
        for ($hour = 7; $hour < 20; $hour++) {
            $start = date("g:i a", strtotime($hour . ":00"));
            $end = date("g:i a", strtotime(($hour + 1) . ":00"));
            $allowedHorarios[] = $start . " - " . $end;
        }

        $validated = $request->validate([
            'id_grupo'      => 'required|numeric|unique:grupos,id_grupo',
            'teacher_rpe'   => 'required|exists:users,rpe',
            'nombre_grupo'  => 'required|string|max:255',
            'horario'       => ['required', 'string', Rule::in($allowedHorarios)],
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
