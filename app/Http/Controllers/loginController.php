<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class loginController extends Controller
{
    // Muestra la vista de login
    public function login()
    {
        return view('login');
    }

    // Procesa la autenticación usando la API y luego valida la existencia en la BD
    public function authenticate(Request $request)
    {
        $request->validate([
            'rpe'      => 'required|string',
            'password' => 'required|string',
        ]);

        // URL del web service (no modificar la key)
        $endpoint = "https://servicios.ing.uaslp.mx/ws_ac_ccomputacion/ValidaUsuario.php";

        // Preparar el JSON a enviar
        $payload = [
            "key"    => env('API_AUTH_KEY', '49E6599C-E580-4BF3-903F-0DE3913FFC6F'),
            "rpe"    => $request->rpe,
            "contra" => $request->password,
        ];

        // Enviar solicitud POST a la API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($endpoint, $payload);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['correcto']) && $data['correcto'] === true) {
                // Extraer el RPE devuelto por la API
                $rpe = $data['datos'][0]['rpe'];
                
                // Buscar al usuario en la base de datos
                $user = User::find($rpe);
                if (!$user) {
                    return back()->withErrors(['login' => 'El usuario no está registrado en el sistema.'])->withInput();
                }

                // Iniciar sesión en Laravel
                Auth::login($user);

                return redirect()->route('home');
            } else {
                return back()->withErrors(['login' => 'Credenciales incorrectas.'])->withInput();
            }
        }

        return back()->withErrors(['login' => 'Error en el servidor'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
