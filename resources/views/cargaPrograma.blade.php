<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>
    <div class="lg:w-full p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
        <div class="w-10/12 py-4 px-2 mx-auto max-w-screen-xl lg:py-3 lg:px-2 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0">
            <!--metodos para enviar los datos ingresados por el becario
                la base de datos en las tablas respectivas-->
                <form class="bg-white shadow-md rounded px-8 pt-2 pb-2 mb-2" method="POST" action="{{ route('home.programa.guardarMateria') }}">
                    @csrf
                    <div class="grid gap-6 mb-6">
                        <!-- Campo Título Materia -->
                        <h2 class="text-lg font-bold text-blue-700 mb-4">Agregar Programa de Estudio</h2>
                        
                        <!-- Campo Título Materia -->
                        <div>
                            <label for="materia" class="block mb-2 font-bold text-blue-700 text-left text-base">
                                Título Materia
                            </label>
                            <input 
                                type="text" 
                                id="materia" 
                                name="materia"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                                placeholder="Ingrese el nombre de la materia" 
                                required 
                            />
                        </div>
                
                        <!-- Campo Cantidad de horas totales -->
                        <div>
                            <label for="horas" class="block mb-2 font-bold text-blue-700 text-left text-base">
                                Cantidad de horas totales
                            </label>
                            <input 
                                type="number" 
                                id="horas" 
                                name="horas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                                placeholder="Ingrese la cantidad de horas totales de la materia" 
                                required 
                            />
                        </div>
                        <!--botones de eleccion de la carrera-->
                        <div class="mt-4">
                            <label class="block mb-2 font-bold text-blue-700 text-left text-base">Seleccionar Carrera</label>
                            <div class="flex justify-around">
                                <button type="button" id="btnSistemasInteligentes"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-green-500 focus:ring-2 focus:ring-blue-500"
                                    onclick="seleccionarCarrera('Ingeniería en Sistemas Inteligentes', 'btnSistemasInteligentes', 'btnSistemasComputacionales')">
                                    Ingeniería en Sistemas Inteligentes
                                </button>
                        
                                <button type="button" id="btnSistemasComputacionales"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-green-500 focus:ring-2 focus:ring-blue-500"
                                    onclick="seleccionarCarrera('Ingeniería en Sistemas Computacionales', 'btnSistemasComputacionales', 'btnSistemasInteligentes')">
                                    Ingeniería en Sistemas Computacionales
                                </button>
                            </div>
                        
                            <!-- Campo oculto para enviar la carrera seleccionada -->
                            <input type="hidden" id="carrera" name="carrera">
                        </div>
                        
                        <!-- Campo Temas -->
                        <div>
                            <label for="temas" class="block mb-2 font-bold text-blue-700 text-left text-base">
                                Carga de Temas y Subtemas
                            </label>
                            <div id="temas-container">
                                
                            </div>
                            <button type="button" id="add-tema" class="text-white font-bold rounded-lg w-full sm:w-auto px-5 py-2.5 text-center text-sm bg-blue-700 hover:bg-blue-500 transition-all duration-1000 ease-in-out">Agregar Tema</button>
                        </div>
                    </div>
                
                    <!-- Botón de registro -->
                    <div class="flex flex-row justify-around">
                        <button type="submit" class="text-white font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-700 hover:bg-blue-500 transition-all duration-1000 ease-in-out">
                            Registrar Programa de Estudio
                        </button>
                    </div> 
                </form>
        </div>   
    </div>
    <script src="{{ asset('js/carga_becario.js') }}"></script>
</x-esqueleto>