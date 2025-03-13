<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function muestraUsarios()
    {
        $usuarios = User::all();
        return view('/usuarios', ['usuarios' => $usuarios]);
    }

    public function agregaUsuario (Request $request){
        //dd($request);

        $usuario = new User();

        $usuario->rpe = $request->rpe;
        $usuario->nombres = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->correo = $request->correo;
        $usuario->institucion = $request->institucion;
        $usuario->numero_celular = $request->telefono;
        $usuario->rol = $request->rol;
        
        $usuario->save();
        return redirect()->back();
    }

    public function editaUsuario (Request $request, $rpe){
        //dd($request);

        $editaUsuario = User::find($rpe);

        $editaUsuario->rpe = $request->rpe;
        $editaUsuario->nombres = $request->nombre;
        $editaUsuario->apellidos = $request->apellidos;
        $editaUsuario->correo = $request->correo;
        $editaUsuario->institucion = $request->institucion;
        $editaUsuario->numero_celular = $request->telefono;
        $editaUsuario->rol = $request->rol;
        
        $editaUsuario->save();
        return redirect()->back();
    }

    public function eliminaUsuario (Request $request, $rpe){
        //dd($request);
        $eliminaUsuario = User::find($rpe);
        $eliminaUsuario->delete();
        return redirect()->back();
    }

}
