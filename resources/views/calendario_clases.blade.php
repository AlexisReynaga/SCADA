<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <section class="py-8 px-4 mx-auto max-w-screen-xl">
        <!-- Botón para cambiar semestre -->
        <div class="text-center mb-4">
            <button id="toggleSemester" class="px-4 py-1.5 font-bold bg-blue-800 text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Cambiar Semestre
            </button>
            <a href="{{ route('home.materias.calendario.carpeta') }}" class="px-4 py-2 font-bold bg-blue-800 text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Archivos de la sesión
            </a>
        </div>
        <!-- Filtros -->
        <div class="py-4 px-2 mx-auto max-w-screen-xl lg:py-3 lg:px-2 
         rounded-lg bg-gray-100 flex justify-around shadow-lg p-5 mb-5">
            <select id="filterMonth" class="px-4 py-2 border rounded-lg ">
                <option value="">Todos los meses</option>
                <option value="0">Enero</option>
                <option value="1">Febrero</option>
                <option value="2">Marzo</option>
                <option value="3">Abril</option>
                <option value="4">Mayo</option>
                <option value="5">Junio</option>
                <option value="6">Julio</option>
                <option value="7">Agosto</option>
                <option value="8">Septiembre</option>
                <option value="9">Octubre</option>
                <option value="10">Noviembre</option>
                <option value="11">Diciembre</option>
            </select>

            <button id="pastDays" class="px-4 py-2 bg-blue-800 font-bold text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Días Pasados
            </button>
            <button id="futureDays" class="px-4 py-2 bg-blue-800 font-bold text-white rounded-lg shadow hover:bg-blue-500 transition-all duration-[500ms] ease-in-out">
                Días Futuros
            </button>
        </div>

        <!-- Contenedor del calendario -->
        <div
            class="grid grid-cols-5 gap-2 bg-gray-100 p-0 sm:p-2 shadow-lg rounded-lg mx-auto w-full max-w-screen-xl lg:py-1 lg:px-1"
            id="calendar"
            data-url="{{ route('home.materias.calendario.sesion') }}"
        >
            <!-- Encabezado (Días de la semana) -->
        </div>

        <script src="{{ asset('js/calendario.js') }}"></script>
    </section>
</x-esqueleto>
