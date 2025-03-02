<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Tema;
use App\Models\Subtema;

class ProgramaDeEstudioController extends Controller
{
    public function programa()
    {
        // Obtener todas las materias con sus temas y subtemas
        $materias = Materia::with('temas.subtemas')->get();

        // Pasar los datos a la vista
        return view('programa', compact('materias'));
    }
}

