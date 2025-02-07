<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <!-- Contenedor del Formulario, preguntar si se debe generar un pdf con las incidencias
    capturadas por el docente-->
    <div class="lg:w-full p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
        <div class="w-10/12 py-4 px-2 mx-auto max-w-screen-xl lg:py-3 lg:px-2 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0">
            <form>
                <div class="grid gap-6 mb-6">
                    <div>
                        <label for="titulo" class="block mb-2 font-bold text-blue-700 text-left text-base">
                            Titulo incidencia
                        </label>
                        <input 
                            type="text" 
                            id="titulo" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
                                   dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 dark:text-black 
                                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                            placeholder="Ingrese el título de la incidencia" 
                            required 
                        />
                    </div>
                     
                    <div>
                        <label for="explicacion" class="block mb-2 font-bold text-blue-700 text-left text-base">Incidencia ocurrida</label>
                        <textarea 
                            id="explicacion"
                            rows="5" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5
                            dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-500 dark:text-black 
                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none resize-y"
                            placeholder="Ingrese la razón de la incidencia" 
                            required
                        ></textarea>
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
                            required
                        >
                        <p class="mt-1 text-sm font-bold dark:text-blue-500" id="file_input_help">
                            archivos necesarios para justificar (MAX. 20mb).
                        </p>
                    </div>           
                </div>
                <div class="flex flex-row justify-around">
                    <button type="submit" 
                        class="text-white font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
                        bg-blue-700 hover:bg-blue-500 transition-all duration-1000 ease-in-out">
                        Registrar incidencia
                        </button>
                </div>
                
            </form>
        </div>   
    </div>
    
</x-esqueleto>