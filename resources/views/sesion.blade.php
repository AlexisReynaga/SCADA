<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    
    <section class="bg-white pt-4">
        <div class="py-4 px-2 mx-auto max-w-screen-xl lg:py-5 lg:px-3 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0">
            <!-- Contenedor principal: Flex para organizar en fila o columna -->
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Contenedor de Programas de Estudio (lado izquierdo en pantallas grandes) -->
                <div class="lg:w-1/3 p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
                    <h2 class="text-2xl tracking-tight font-extrabold text-blue-800 mb-3 pb-3">Programas de estudio</h2>
                        <!-- Lista dinámica de temas y subtemas -->
                <div id="temas-lista" class="bg-gray-200 p-6 rounded-lg shadow-md border border-gray-300">
                    <ul id="temas-ul" class="mt-3 list-disc pl-5 text-left">
                        <!-- Ejemplo de tema y subtemas, falta probar cargando temas reales
                        pero ya tiene el funcionamiento de seleccionar y deseleccionar ambos
                    casos -->
                        <li data-tema="Programación - Introducción 1">
                            <span class="font-semibold cursor-pointer bg-blue-700 shadow-md rounded-lg text-center p-1 text-white">Programación - Introducción 1</span>
                            <ul class="ml-4 list-circle">
                                <li class="cursor-pointer p-1 hover:bg-blue-300 rounded-lg" data-subtema="Variables">Variables</li>
                                <li class="cursor-pointer p-1 hover:bg-blue-300 rounded-lg" data-subtema="Ciclos">Ciclos</li>
                                <li class="cursor-pointer p-1 hover:bg-blue-300 rounded-lg" data-subtema="Condicionales">Condicionales</li>
                            </ul>
                        </li>
                        <li data-tema="Estructuras">
                            <span class="font-semibold cursor-pointer bg-blue-700 shadow-md rounded-lg text-center p-1 text-white">Estructuras</span>
                            <ul class="ml-4 list-circle">
                                <li class="cursor-pointer p-1 hover:bg-blue-300 rounded-lg" data-subtema="Prueba 1">Prueba 1</li>
                                <li class="cursor-pointer p-1 hover:bg-blue-300 rounded-lg" data-subtema="Prueba 2">Prueba 2</li>
                                <li class="cursor-pointer p-1 hover:bg-blue-300 rounded-lg" data-subtema="Prueba 3">Prueba 3</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
                <!-- Contenedor del Formulario (lado derecho en pantallas grandes) -->
                <div class="lg:w-2/3 p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
                    <form>
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="titulo" class="block mb-2 font-bold text-blue-700 text-left text-base">
                                    Título de la actividad
                                </label>
                                <input 
                                    type="text" 
                                    id="titulo" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                           dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 dark:text-black 
                                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                                    placeholder="Ingrese el título de la actividad" 
                                    required 
                                />
                            </div>
                            <div>
                                <label for="tema" class="block mb-2 font-bold text-blue-700 text-left text-base">Tema</label>
                                <input 
                                    type="text" id="tema" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                    dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 dark:text-black 
                                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                    placeholder="Ingrese el título del tema visto" 
                                    required
                                />
                            </div>
                            <div>
                                <label for="subtema" class="block mb-2 font-bold text-blue-700 text-left text-base">Subtema</label>
                                <input 
                                    type="text" id="subtema" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                    dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 dark:text-black 
                                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                    placeholder="Ingrese el título del subtema visto" 
                                    required
                                />
                            </div>
                            <div>
                                <label for="actividad" class="block mb-2 font-bold text-blue-700 text-left text-base">Actividades</label>
                                <textarea 
                                    id="actividad"
                                    rows="5" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5
                                    dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 dark:text-black 
                                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none resize-y"
                                    placeholder="Ingrese las actividades realizadas" 
                                    required
                                ></textarea>
                            </div>
                            <!-- Nuevo campo para enlaces -->
                            <div>
                                <label for="links" class="block mb-2 font-bold text-blue-700 text-left text-base">
                                    Enlaces de videos o páginas web
                                </label>
                                <input 
                                    type="url" id="links" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                        dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 dark:text-black 
                                        focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                    placeholder="Pegue aquí el enlace (YouTube, páginas, documentos, etc.)" 
                                />
                            </div>
                            <div>
                                <label class="block mb-2 font-bold text-blue-700 text-left text-base" for="file_input">
                                    Subir archivos
                                </label>
                                
                                <input 
                                    class="block w-full text-sm text-gray-900 border border-blue-700 rounded-lg cursor-pointer 
                                           bg-gray-50 dark:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 
                                           dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 file:mr-4 
                                           file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold 
                                           file:bg-blue-700 file:text-white hover:file:bg-blue-500 transition-all duration-1000 ease-in-out" 
                                    aria-describedby="file_input_help" 
                                    id="file_input" 
                                    type="file"
                                >
                                
                                <p class="mt-1 text-sm font-bold dark:text-blue-500" id="file_input_help">
                                    JPG, PNG, CSV, PDF, DOCX (MAX. 20mb).
                                </p>
                            </div>           
                        </div>
                        <div class="flex flex-row justify-around">
                            <button type="submit" 
                                class="text-white font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
                                bg-blue-700 hover:bg-blue-500 transition-all duration-1000 ease-in-out">
                                Guardar
                                </button>
                            <a href="{{ route('incidencia') }}"
                                class="text-white font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
                                bg-blue-700 hover:bg-blue-500 transition-all duration-500 ease-in-out">
                                Ocurrio una incidencia
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/carga_temas.js') }}"></script>
</x-esqueleto>
