<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materia;
use App\Models\GrupoUsuario;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Obtener los grupos en los que está inscrito usando su RPE
        $gruposUsuario = GrupoUsuario::where('fk_clave_maestro', $usuario->rpe)
                        ->with('grupo.materia') // Carga la relación del grupo y su materia
                        ->get();
        return view('home', compact('gruposUsuario'));
    }
}
