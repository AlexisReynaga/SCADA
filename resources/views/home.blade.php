<x-esqueleto>
<x-nav-bar></x-nav-bar>  
<x-rutas/> 
<section class="lg:w-full p-4 bg-white shadow-md rounded-lg text-center transition-all duration-2000">
    
    <div class="py-4 px-2 mx-auto max-w-screen-xl lg:py-3 lg:px-2 
         rounded-lg bg-gray-100 flex justify-center shadow-lg">
        <div class="w-full p-5 m-2 bg-white text-white rounded-lg transition-all duration-[300ms] ease-in-out">
            <h1 class="text-4xl tracking-tight font-extrabold text-blue-800">Bienvenido al sistema SCAAD</h1>
        </div>   
    </div>
    <!--ordena elementos div-->
    <!--esto lo veria unicamente el administrador y el docente, por el momento,
        se deben crear varias vistas para los demas roles-->
    @if(in_array(auth()->user()->rol, ['docente']))
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-2 justify-items-center">
        <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
            rounded-lg bg-gray-100 mt-5 shadow-2xl">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Materias</h2>
            </div>
            <div class="grid sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                @foreach($gruposUsuario as $grupoUsuario)
                <a href="{{ route('home.materias.calendario')}}" class="block w-full p-3 bg-white rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-600 transition-all duration-[400ms] ease-in-out 
                            hover:shadow-xl">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        {{ $grupoUsuario->grupo->materia->nombre }}
                    </h6>
                </a> 
                @endforeach     
            </div>
        </div>
        <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
            rounded-lg bg-gray-100 mt-5 shadow-2xl">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Archivos</h2>
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                <a href="{{ route('home.materias')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        ver archivos
                    </h6>
                </a>      
            </div>
        </div>
        <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
            rounded-lg bg-gray-100 mt-5 shadow-2xl">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Reportes</h2>
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                <a href="{{ route('home.materias.calendario.sesion')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        ver reportes
                    </h6>
                </a>      
            </div>
        </div>
        <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
            rounded-lg bg-gray-100 mt-5 shadow-2xl">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Perfil</h2>
            </div>
            <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                <a href="{{ route('home.perfil')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                            dark:bg-blue-800 dark:border-blue-800 
                            dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                            hover:shadow-xl hover:border-blue-800">
                    <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        ver perfil
                    </h6>
                </a>      
            </div>
        </div>
    </div> 
    @endif
    @if(in_array(auth()->user()->rol, ['admin']))
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-2 justify-items-center">
            <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
                rounded-lg bg-gray-100 mt-5 shadow-2xl">
                <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                    <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Ver Usuarios</h2>
                </div>
                <div class="grid sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                    <a href="{{ route('home.cargaDocMat')}}" class="block w-full p-3 bg-white rounded-lg shadow-md 
                                dark:bg-blue-800 dark:border-blue-800 
                                dark:hover:bg-blue-600 transition-all duration-[400ms] ease-in-out 
                                hover:shadow-xl">
                        <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            Administrar Usuarios
                        </h6>
                    </a>    
                </div>
            </div>
            <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
            rounded-lg bg-gray-100 mt-5 shadow-2xl">
                <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                    <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Perfil</h2>
                </div>
                <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                    <a href="{{ route('home.perfil')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                                dark:bg-blue-800 dark:border-blue-800 
                                dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                                hover:shadow-xl hover:border-blue-800">
                        <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            ver perfil
                        </h6>
                    </a>      
                </div>
            </div>
            <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
                rounded-lg bg-gray-100 mt-5 shadow-2xl">
                <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                    <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Agregar Usuarios</h2>
                </div>
                <div class="grid sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                    <a href="{{ route('home.usuarios')}}" class="block w-full p-3 bg-white rounded-lg shadow-md 
                                dark:bg-blue-800 dark:border-blue-800 
                                dark:hover:bg-blue-600 transition-all duration-[400ms] ease-in-out 
                                hover:shadow-xl">
                        <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            Alta de Usuarios
                        </h6>
                    </a>    
                </div>
            </div>
        </div> 
    @endif
    @if(in_array(auth()->user()->rol, ['becario']))
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-2 justify-items-center">
            <div class="w-4/12 py-4 px-2 lg:py-3 lg:px-2 
                rounded-lg bg-gray-100 mt-5 shadow-2xl">
                <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                    <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Programas de estudio</h2>
                </div>
                <div class="grid sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                    <a href="{{ route('home.programa')}}" class="block w-full p-3 bg-white rounded-lg shadow-md 
                                dark:bg-blue-800 dark:border-blue-800 
                                dark:hover:bg-blue-600 transition-all duration-[400ms] ease-in-out 
                                hover:shadow-xl">
                        <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            Ver Programas de estudio
                        </h6>
                    </a>    
                </div>
            </div>
            <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
            rounded-lg bg-gray-100 mt-5 shadow-2xl">
                <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                    <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Perfil</h2>
                </div>
                <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                    <a href="{{ route('home.perfil')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                                dark:bg-blue-800 dark:border-blue-800 
                                dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                                hover:shadow-xl hover:border-blue-800">
                        <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            ver perfil
                        </h6>
                    </a>      
                </div>
            </div>
        </div> 
    @endif
    @if(in_array(auth()->user()->rol, ['coordinador_ISI', 'coordinador_COMP', 'jefe_area']))
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-2 justify-items-center">
            <div class="w-4/12 py-4 px-2 lg:py-3 lg:px-2 
                rounded-lg bg-gray-100 mt-5 shadow-2xl">
                <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                    <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Bitácora</h2>
                </div>
                <div class="grid sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                    <a href="{{ route('home.bitacora')}}" class="block w-full p-3 bg-white rounded-lg shadow-md 
                                dark:bg-blue-800 dark:border-blue-800 
                                dark:hover:bg-blue-600 transition-all duration-[400ms] ease-in-out 
                                hover:shadow-xl">
                        <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            Ver Bitácoras
                        </h6>
                    </a>    
                </div>
            </div>
            <div class="w-9/12 py-4 px-2 lg:py-3 lg:px-2 
            rounded-lg bg-gray-100 mt-5 shadow-2xl">
                <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                    <h2 class="text-lg tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Perfil</h2>
                </div>
                <div class="grid grid-flow-row-1 sm:grid-rows-1 lg:grid-rows-1 gap-6 mb-2">
                    <a href="{{ route('home.perfil')}}" class="block w-full p-3 bg-white border border-gray-200 rounded-lg shadow-md 
                                dark:bg-blue-800 dark:border-blue-800 
                                dark:hover:bg-blue-500 transition-all duration-[500ms] ease-in-out 
                                hover:shadow-xl hover:border-blue-800">
                        <h6 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            ver perfil
                        </h6>
                    </a>      
                </div>
            </div>
        </div> 
    @endif
</section>
</x-esqueleto>
