<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <section class="bg-white pt-6">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 
    border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-4xl tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Programas de estudio</h2>
            </div>
            <div class="flex justify-end">
              <div >
                <form class="flex items-center max-w-lg mx-auto">   
                  <label for="voice-search" class="sr-only">Buscar</label>
                  <div class="relative w-full">
                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                          </svg>
                      </div>
                      <input type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar..." required />
                  </div>
                  <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                      </svg>Buscar
                  </button>
                </form>

              </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-2">
                <a href="{{ route('home.programa.cargaPrograma') }}"
                    class="text-white font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
                     bg-blue-700 hover:bg-blue-500 transition-all duration-500 ease-in-out">
                    Agregar programa de estudio
                </a>
                <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm3 4h4m-4 4h4m-5 4h6" />
                    </svg>Cargar programas de estudio
                </button>
            </div>

            @if ($materias->isEmpty())
                <p class="text-red-500">No hay materias registradas.</p>
            @endif

            <!--carga de planes de estudio y mostrarlos-->
            @foreach ($materias as $materia)
                <div id="expandableCard{{ $materia->id_clave }}" class="relative p-7 bg-white rounded-2xl shadow-lg transition-all duration-300 cursor-pointer gap-6 m-4">
                    <div class="flex items-center justify-between pb-4">
                        <button id="toggleButton{{ $materia->id_clave }}" class="text-sm text-blue-600 focus:outline-none">
                            Expandir
                        </button>
                    </div>

                    <div id="additionalContent{{ $materia->id_clave }}" class="hidden mt-4 space-y-4">
                        <div class="grid grid-cols-5 grid-rows-2 gap-4">
                            <h2 class="mb-2 text-lg font-bold tracking-tight text-gray-800">
                                {{ $materia->id_clave ?? 'Sin clave' }} - {{ $materia->nombre ?? 'Sin nombre' }}
                            </h2>
                            <div class="col-span-3">
                                <p class="text-sm text-gray-500">Carrera:</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $materia->carrera ?? 'No especificada' }}</p>
                            </div>
                            <div class="col-span-3 col-start-1 row-start-2">
                                <p class="text-sm text-gray-500">Créditos:</p>
                                <p class="text-lg font-semibold text-gray-800">{{ $materia->creditos }}</p>
                            </div>
                            <div class="col-start-4 row-start-1">
                                <p class="text-gray-500 text-center">Total de horas:</p>
                                <p class="text-lg font-semibold text-gray-800 text-center">{{ $materia->total_horas }}</p>
                            </div>
                            <div class="col-start-5 row-start-1">
                                <p class="text-gray-500 text-center">Horas teoría:</p>
                                <p class="text-lg font-semibold text-gray-800 text-center">{{ $materia->horas_teoria }}</p>
                            </div>
                            <div class="col-start-4 row-start-2">
                                <p class="text-gray-500 text-center">Horas prácticas:</p>
                                <p class="text-lg font-semibold text-gray-800 text-center">{{ $materia->horas_practica }}</p>
                            </div>
                            <div class="col-start-5 row-start-2">
                                <p class="text-gray-500 text-center">Horas autónomas:</p>
                                <p class="text-lg font-semibold text-gray-800 text-center">{{ $materia->horas_autonomas }}</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h3 class="text-2xl font-bold text-gray-800">Contenido temático:</h3>
                            <ul class="mt-2 space-y-2">
                                @foreach ($materia->temas as $tema)
                                    <li>
                                        <p class="text-xl font-medium text-gray-700">Tema {{ $tema->n_tema }}: {{ $tema->tema }}</p>
                                        <ul class="ml-4 list-disc text-lg text-gray-600">
                                            @foreach ($tema->subtemas as $subtema)
                                                <li>Subtema: {{ $subtema->subtema }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-6 flex justify-end space-x-2">
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-amber-200 rounded-lg hover:bg-amber-300">
                                <a href="#">Ir a temario</a>
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Editar
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('toggleButton{{ $materia->id_clave }}').addEventListener('click', function() {
                        let content = document.getElementById('additionalContent{{ $materia->id_clave }}');
                        content.classList.toggle("hidden");
                        this.textContent = content.classList.contains("hidden") ? "Expandir" : "Contraer";
                    });
                </script>
            @endforeach
        </div>
    </section>
</x-esqueleto>
