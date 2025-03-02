<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <div class="lg:w-full p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
        <div class="w-10/12 py-4 px-2 mx-auto max-w-screen-xl lg:py-3 lg:px-2 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0">
            
            <!-- Formulario de búsqueda -->
            <form action="{{ route('home.cargaDocMat') }}" method="get" class="bg-white shadow-md rounded px-8 pt-2 pb-2 mb-2">
                <div class="grid gap-6 mb-6">
                    <!-- Buscar por nombre o apellido -->
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

                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg mt-2">
                        Buscar
                    </button>
                </div>
            </form>

            <!-- Botón para mostrar todos los usuarios -->
            <a href="{{ route('home.cargaDocMat') }}"
               class="bg-blue-500 text-white p-2 rounded-lg mt-2">
                Mostrar todos los usuarios
            </a>

            <!-- Listado de usuarios -->
            <div class="overflow-x-auto mt-6">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Nombre</th>
                            <th class="px-4 py-2 text-left">Apellidos</th>
                            <th class="px-4 py-2 text-left">Correo</th>
                            <th class="px-4 py-2 text-left">Rol</th>
                            <th class="px-4 py-2 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->nombres }}</td>
                                <td class="border px-4 py-2">{{ $user->apellidos }}</td>
                                <td class="border px-4 py-2">{{ $user->correo }}</td>
                                <td class="border px-4 py-2">{{ $user->rol }}</td>
                                <td class="border px-4 py-2">
                                    @if($user->rol === 'docente')
                                        <!-- Al hacer clic se recarga la vista con teacher_rpe en la query string -->
                                        <a href="{{ route('home.cargaDocMat', array_merge(request()->all(), ['teacher_rpe' => $user->rpe])) }}" 
                                           class="bg-green-500 text-white p-2 rounded">
                                            Asignar Grupo
                                        </a>
                                    @endif
                                </td>
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

            <!-- Sección de asignación de grupo (solo se muestra si se selecciona un docente) -->
            @if(isset($teacher))
            <div class="mt-8 bg-white p-6 rounded shadow-md">
                <h2 class="text-2xl font-bold mb-4">
                    Asignar Grupo a: {{ $teacher->nombres }} {{ $teacher->apellidos }}
                </h2>
                <form action="{{ route('home.asignarGrupo.store') }}" method="POST">
                    @csrf
                    <!-- Campo para asignar el ID del grupo de forma manual -->
                    <div class="mb-4">
                        <label for="id_grupo" class="block text-gray-700 text-sm font-bold mb-2">
                            ID del Grupo
                        </label>
                        <input type="number" name="id_grupo" id="id_grupo" required
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none"
                               placeholder="Ingrese el ID del grupo">
                        @error('id_grupo')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo oculto para el docente -->
                    <input type="hidden" name="teacher_rpe" value="{{ $teacher->rpe }}">

                    <!-- Nombre del grupo -->
                    <div class="mb-4">
                        <label for="nombre_grupo" class="block text-gray-700 text-sm font-bold mb-2">
                            Nombre del Grupo
                        </label>
                        <input type="text" name="nombre_grupo" id="nombre_grupo" required
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none">
                        @error('nombre_grupo')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Horario -->
                    <div class="mb-4">
                        <label for="horario" class="block text-gray-700 text-sm font-bold mb-2">
                            Horario
                        </label>
                        <input type="text" name="horario" id="horario" required
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none">
                        @error('horario')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Capacidad -->
                    <div class="mb-4">
                        <label for="capacidad" class="block text-gray-700 text-sm font-bold mb-2">
                            Capacidad
                        </label>
                        <input type="number" name="capacidad" id="capacidad" required
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none">
                        @error('capacidad')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Selección de Materia -->
                    <div class="mb-4">
                        <label for="fk_id_materia" class="block text-gray-700 text-sm font-bold mb-2">
                            Materia
                        </label>
                        <select name="fk_id_materia" id="fk_id_materia" required
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none">
                            <option value="">Seleccione una materia</option>
                            @foreach($materias as $materia)
                                <option value="{{ $materia->id_clave }}">{{ $materia->nombre }}</option>
                            @endforeach
                        </select>
                        @error('fk_id_materia')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                        Asignar Grupo
                    </button>
                </form>
            </div>
            @endif

        </div>   
    </div>
</x-esqueleto>
