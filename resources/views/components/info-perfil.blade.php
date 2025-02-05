@php
    $user = Auth::user();
@endphp

<h1 class="text-center font-bold text-xl">INFORMACIÓN GENERAL</h1>

<div class="flex justify-center items-start min-h-screen bg-gray-100 pt-8">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl w-full">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    {{ $user->nombres }}
                </p>
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    {{ $user->apellidos }}
                </p>
            </div>
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900">Institución</label>
                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    {{ $user->institucion }}
                </p>
            </div>  
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Número Celular</label>
                <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    {{ $user->numero_celular }}
                </p>
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico</label>
            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                {{ $user->correo }}
            </p>
        </div> 
        <div class="mb-6">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Rol</label>
            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                {{ ucfirst($user->rol) }} <!-- Convierte la primera letra en mayúscula -->
            </p>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                •••••••••
            </p>
        </div> 
    </div>
</div>
