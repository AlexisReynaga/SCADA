<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Tema;
use App\Models\Subtema;
use Illuminate\Support\Facades\DB;

class CargaProgramaController extends Controller
{
    public function cargaP()
    {
        return view('cargaPrograma');
    }

    public function guardarMateria(Request $request)
    {
        // Validación incluyendo el campo id_clave y creditos
        $request->validate([
            'id_clave' => 'required|numeric|unique:materias,id_clave',
            'materia'  => 'required|string|max:255',
            'creditos' => 'required|integer|min:1',
            'horas'    => 'required|integer|min:1',
            'carrera'  => 'required|string|in:Ingeniería en Sistemas Inteligentes,Ingeniería en Sistemas Computacionales',
            'temas'    => 'array',
            'temas.*'  => 'string|max:255', // Cada tema es una cadena de texto
            'subtemas' => 'array',
            'subtemas.*' => 'array', // Cada subtema pertenece a un tema
        ]);

        DB::beginTransaction();
        try {
            // Guardar la Materia usando el id_clave y los créditos 
            $materia = Materia::create([
                'id_clave'     => $request->id_clave,
                'nombre'       => $request->materia,
                'total_horas'  => $request->horas,
                'creditos'     => $request->creditos,
                'carrera'      => $request->carrera,
                'horas_teoria' => 0,
                'horas_practica' => 0,
                'horas_autonomas' => 0,
            ]);

            // Guardar los Temas y Subtemas
            foreach ($request->temas as $index => $temaNombre) {
                $tema = Tema::create([
                    'fk_clave'   => $materia->id_clave,
                    'n_tema'     => $index + 1, // Número de tema
                    'horas_tema' => 0, 
                    'tema'       => $temaNombre
                ]);

                // Guardar Subtemas del Tema correspondiente
                if (isset($request->subtemas[$index])) {
                    foreach ($request->subtemas[$index] as $subtemaNombre) {
                        if (!empty($subtemaNombre)) {
                            Subtema::create([
                                'fk_id_tema' => $tema->id_tema,
                                'subtema'    => $subtemaNombre
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Programa de estudio registrado correctamente.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error al guardar: ' . $e->getMessage());
        }
    }
}
