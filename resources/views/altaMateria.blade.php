<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <h1 class="text-center text-xl font-bold">Alta de Materia</h1>
    <div class="flex justify-center items-start min-h-screen bg-gray-100 pt-8">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl w-full">
            <form>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="nombre_mat" class="block mb-2 text-sm font-medium text-gray-900">Nombre de la Materia</label>
                        <input type="text" id="nombre_mat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Probabilidad y estadistica" required />
                    </div>
                    <div>
                        <label for="clave_mat" class="block mb-2 text-sm font-medium text-gray-900">Clave de la Materia</label>
                        <input type="number" id="clave_mat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="9721324" required />
                    </div>
                    <div>
                        <label for="grupo" class="block mb-2 text-sm font-medium text-gray-900">Grupo</label>
                        <input type="number" id="grupo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="30342" required />
                    </div>
                    <div>
                        <label for="clave_fac" class="block mb-2 text-sm font-medium text-gray-900">Clave de la Facultad</label>
                        <input type="number" id="clave_fac" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123124" required />
                    </div>
                    <div>
                        <label for="semestre" class="block mb-2 text-sm font-medium text-gray-900">Semestre</label>
                        <input type="text" id="semestre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="5to Semestre" required />
                    </div>  
                    <div>
                        <label for="horario" class="block mb-2 text-sm font-medium text-gray-900">Horario de Clase</label>
                        <input type="text" id="horario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="10:00-11:00" required />
                    </div>
                    <div>
                        <label for="nom_prof" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Profesor</label>
                        <input type="text" id="nom_prof" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jaime Meade" required />
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
</x-esqueleto>