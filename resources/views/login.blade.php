<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="flex flex-col min-h-screen min-w-full">
    <x-header></x-header>
    <div class="flex justify-center min-w-full my-20">
        <body class="bg-white flex items-center justify-center min-h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl font-bold text-center text-blue-600">Iniciar Sesión</h2>

                <!-- Mostrar errores -->
                @if($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded-lg text-center my-4">
                        {{ $errors->first('login') }}
                    </div>
                @endif

                <!-- Formulario de login modificado -->
                <form action="{{ route('login.process') }}" method="POST" class="mt-6">
                    @csrf

                    <!-- Campo RPE -->
                    <div class="mb-4">
                        <label for="rpe" class="block text-gray-700 font-semibold">RPE</label>
                        <input type="text" id="rpe" name="rpe" required 
                            class="w-full mt-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-semibold">Contraseña</label>
                        <input type="password" id="password" name="password" required 
                            class="w-full mt-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Botón de Envío -->
                    <button type="submit" 
                        class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                        Iniciar Sesión
                    </button>
                </form>

                <!-- Link para recuperar contraseña -->
                <div class="mt-4 text-center">
                    <a href="#" class="text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
                </div>
            </div>
        </body>
    </div>     
    <x-footer></x-footer>
</div>
</html>
