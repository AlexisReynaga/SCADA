<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <div class="lg:w-full p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
        <div class="w-10/12 py-4 px-2 mx-auto max-w-screen-xl lg:py-3 lg:px-2 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0">
            
            <!-- Formulario de búsqueda -->
            <form action="{{ route('home.cargaDocMat') }}" method="get" class="bg-white shadow-md rounded px-8 pt-2 pb-2 mb-2">
                <div class="grid gap-6 mb-6">
                    <!-- Campo de búsqueda por nombre y apellido -->
                    <div>
                        <label for="search" class="block mb-2 font-bold text-blue-700 text-left text-base">
                            Buscar usuario por nombre o apellido
                        </label>
                        <input 
                            type="text" 
                            name="search" 
                            id="search" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5
                                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                            placeholder="Buscar usuario..." 
                            value="{{ request()->query('search') }}"
                        />
                    </div>

                    <!-- Filtro de correo -->
                    <div>
                        <label for="correo" class="block mb-2 font-bold text-blue-700 text-left text-base">
                            Filtrar por correo
                        </label>
                        <select 
                            name="correo" 
                            id="correo" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5
                                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                        >
                            <option value="">Seleccionar correo</option>
                            @foreach($users->pluck('correo')->unique() as $correo)
                                <option value="{{ $correo }}" {{ request('correo') == $correo ? 'selected' : '' }}>
                                    {{ $correo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtro de rol -->
                    <div>
                        <label for="rol" class="block mb-2 font-bold text-blue-700 text-left text-base">
                            Filtrar por rol
                        </label>
                        <select 
                            name="rol" 
                            id="rol" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5
                                focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                        >
                            <option value="">Seleccionar rol</option>
                            @foreach($users->pluck('rol')->unique() as $rol)
                                <option value="{{ $rol }}" {{ request('rol') == $rol ? 'selected' : '' }}>
                                    {{ $rol }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg mt-2">Buscar</button>
                </div>
            </form>

            <!-- Botón para mostrar todos los usuarios -->
            <a href="{{ route('home.cargaDocMat') }}"
                class="bg-blue-500 text-white p-2 rounded-lg mt-2">Mostrar todos los usuarios</a>

            <!-- Mostrar los usuarios -->
            <div class="overflow-x-auto mt-6">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Nombre</th>
                            <th class="px-4 py-2 text-left">Apellidos</th>
                            <th class="px-4 py-2 text-left">Correo</th>
                            <th class="px-4 py-2 text-left">Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->nombres }}</td>
                                <td class="border px-4 py-2">{{ $user->apellidos }}</td>
                                <td class="border px-4 py-2">{{ $user->correo }}</td>
                                <td class="border px-4 py-2">{{ $user->rol }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('home')}}"
                class="text-white font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
                 bg-blue-700 hover:bg-blue-500 transition-all duration-1000 ease-in-out">
                Regresar
            </a>
        </div>   
    </div>
</x-esqueleto>
