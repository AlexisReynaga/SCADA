<x-esqueleto>
<x-nav-bar></x-nav-bar>
<<<<<<< HEAD
<main class="p-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex gap-2 items-center mb-4">
            <input type="text" placeholder="Buscar" class="border p-2 rounded w-full">
        </div>
        <h1 class="text-center text-xl font-bold">REGISTRO DIARIO</h1>
        <div class="mt-4 h-80 border rounded bg-gray-100"></div>
        

        <div class="flex justify-end mt-4">
            <x-Button>
                Guardar
            </x-Button>
=======
<section class="lg:w-full p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
    <div class="w-10/12 py-4 px-2 mx-auto max-w-screen-xl lg:py-3 lg:px-2 
        border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0 flex justify-center">
        <div class="w-7/12 p-2 mt-2 bg-white text-white rounded-lg transition-all duration-[300ms] ease-in-out">
            <h1 class="text-4xl tracking-tight font-extrabold text-blue-800 mb-3 pb-3 pt-3 mt-3">Bienvenido al sistema SCADA</h1>
>>>>>>> main
        </div>
        
    </div>
    <!--ordena elementos div-->
    <div class="flex flex-row justify-around">
        <div class="w-4/12 py-4 px-2 lg:py-3 lg:px-2 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-5">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-2xl tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Materias</h2>
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                <a href="{{ route('calendario')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        Programación
                    </h6>
                </a>      
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                <a href="{{ route('calendario')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        Desarrollo web
                    </h6>
                </a>                  
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6">
                <a href="{{ route('calendario')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        Probabilidad y estadística
                    </h6>
                </a>                  
            </div>
        </div>
        <div class="w-4/12 py-4 px-2 lg:py-3 lg:px-2 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-5">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-2xl tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Archivos</h2>
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                <a href="{{ route('materias')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        ver archivos
                    </h6>
                </a>      
            </div>
        </div>
        <div class="w-4/12 py-4 px-2 lg:py-3 lg:px-2 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-5">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-2xl tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Reportes</h2>
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                <a href="{{ route('sesion')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        ver reportes
                    </h6>
                </a>      
            </div>
        </div>
    </div>   
</section>
</x-esqueleto>
