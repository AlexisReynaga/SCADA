<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;

class sesionController extends Controller
{
    public function sesion()
    {
        return view('sesion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'subtema' => 'required|string|max:255',
            'actividad' => 'required|string',
            'links' => 'nullable|url',
            'archivo' => 'nullable|file|max:20480', // 20MB
        ]);

        $sesion = new Sesion();
        $sesion->id_grupo = 1; // Aquí debes obtener el id_grupo correcto
        $sesion->fecha = now();
        $sesion->hora_inicio = now();
        $sesion->hora_fin = now();
        $sesion->titulo_actividad = $request->titulo;
        $sesion->tema = $request->tema;
        $sesion->subtema = $request->subtema;
        $sesion->actividades = $request->actividad;
        $sesion->enlaces = $request->links;
        $sesion->archivo = $request->hasFile('archivo');
        $sesion->estado = 'activo';
        $sesion->save();

        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $rutaArchivo = $archivo->storeAs('archivos', $nombreArchivo, 'public');
            // Aquí puedes guardar la ruta del archivo en la base de datos si lo necesitas
        }

        return redirect()->route('home.materias.calendario.sesion')->with('success', 'Sesión guardada correctamente');
    }
}