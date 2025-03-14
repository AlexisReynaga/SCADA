<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">
                Asignar Grupo a: {{ $teacher->nombres }} {{ $teacher->apellidos }}
            </h2>
            <form action="{{ route('home.asignarGrupo.store') }}" method="POST">
                @csrf
                <input type="hidden" name="teacher_rpe" value="{{ $teacher->rpe }}">

                <!-- Campo: ID del Grupo -->
                <div class="mb-4">
                    <label for="id_grupo" class="block text-gray-700 font-bold mb-2">
                        ID del Grupo
                    </label>
                    <input type="number" name="id_grupo" id="id_grupo" required 
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Ingrese el ID del grupo" value="{{ old('id_grupo') }}">
                    @error('id_grupo')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo: Nombre del Grupo -->
                <div class="mb-4">
                    <label for="nombre_grupo" class="block text-gray-700 font-bold mb-2">
                        Nombre del Grupo
                    </label>
                    <input type="text" name="nombre_grupo" id="nombre_grupo" required 
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Ingrese el nombre del grupo" value="{{ old('nombre_grupo') }}">
                    @error('nombre_grupo')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo: Horario (desplegable) -->
                <div class="mb-4">
                    <label for="horario" class="block text-gray-700 font-bold mb-2">
                        Horario
                    </label>
                    <select name="horario" id="horario" required 
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Seleccione un horario</option>
                        @for ($hour = 7; $hour < 20; $hour++)
                            @php
                                $start = date("g:i a", strtotime($hour . ":00"));
                                $end = date("g:i a", strtotime(($hour + 1) . ":00"));
                                $slot = $start . " - " . $end;
                            @endphp
                            <option value="{{ $slot }}" {{ old('horario') == $slot ? 'selected' : '' }}>
                                {{ $slot }}
                            </option>
                        @endfor
                    </select>
                    @error('horario')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo: Capacidad -->
                <div class="mb-4">
                    <label for="capacidad" class="block text-gray-700 font-bold mb-2">
                        Capacidad
                    </label>
                    <input type="number" name="capacidad" id="capacidad" required 
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Ingrese la capacidad" value="{{ old('capacidad') }}">
                    @error('capacidad')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo: Materia -->
                <div class="mb-6">
                    <label for="fk_id_materia" class="block text-gray-700 font-bold mb-2">
                        Materia
                    </label>
                    <select name="fk_id_materia" id="fk_id_materia" required 
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id_clave }}" {{ old('fk_id_materia') == $materia->id_clave ? 'selected' : '' }}>
                                {{ $materia->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('fk_id_materia')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                        Asignar Grupo
                    </button>
                    <a href="{{ route('home.cargaDocMat') }}" class="text-blue-500 hover:underline">
                        Volver
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-esqueleto>
