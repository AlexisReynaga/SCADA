<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class loginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validar los datos ingresados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intentar autenticar al usuario
        $user = User::where('correo', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Iniciar sesión manualmente
            Auth::login($user);

            // Redirigir a la vista home
            return redirect()->route('home');
        }

        // Si falla, regresar con error
        return back()->withErrors(['email' => 'Credenciales incorrectas.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
