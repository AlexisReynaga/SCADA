<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <x-rutas/>

    <section class="bg-white pt-6">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 
            border-4 border-gray-300 rounded-lg bg-gray-200 mt-0 pt-0">
            <div class="mx-auto max-w-screen-sm text-center mb-0 lg:mb-0">
                <h2 class="text-4xl tracking-tight font-extrabold text-blue-800 dark:text-gray mb-3 pb-3">Materias</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($gruposUsuario as $grupoUsuario)
                    <a href="{{ route('home.materias.calendario') }}" 
                       class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md
                              dark:bg-blue-800 dark:border-blue-800 
                              dark:hover:bg-blue-500 transition-all duration-[1000ms] ease-in-out
                              hover:shadow-xl hover:border-blue-800">
                        
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-white">
                            {{ $grupoUsuario->grupo->materia->nombre }}
                        </h6>
                        <p class="font-normal text-white">
                            <strong>Grupo:</strong> {{ $grupoUsuario->grupo->id_grupo }} <br>
                            <strong>Horario:</strong> {{ $grupoUsuario->grupo->horario }} <br>
                            <strong>Capacidad:</strong> {{ $grupoUsuario->grupo->capacidad }}
                        </p>
                    </a>  
                @endforeach                
            </div>
        </div>
    </section>
</x-esqueleto>
