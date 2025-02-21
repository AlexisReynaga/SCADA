<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class cargaDocMatController extends Controller
{
    public function cargaDocMat(Request $request){
        $query = User::query();

        // Filtrar por nombre y apellido si se ingresa un término de búsqueda
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->input('search');
            $query->where('nombres', 'like', '%' . $searchTerm . '%')
                  ->orWhere('apellidos', 'like', '%' . $searchTerm . '%');
        }

        // Filtrar por correo si se selecciona un filtro
        if ($request->has('correo') && !empty($request->correo)) {
            $query->where('correo', $request->correo);
        }

        // Filtrar por rol si se selecciona un filtro
        if ($request->has('rol') && !empty($request->rol)) {
            $query->where('rol', $request->rol);
        }

        // Obtener los usuarios según los filtros aplicados
        $users = $query->get();

        return view('cargaDocMat', compact('users'));
    }
}


