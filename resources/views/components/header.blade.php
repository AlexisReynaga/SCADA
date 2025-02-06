<header class="text-white">
    <div class="bg-blue-800 flex flex-wrap items-center justify-between p-3 md:p-5">
        <!-- Logo -->
        <div class="flex items-center gap-4 pl-3 md:pl-6"> 
            <img src="{{ asset('images/UASLP.png') }}" alt="UASLP" class="h-10 md:h-12"> 
        </div>

        <!-- Nombre de la Universidad -->
        <div class="flex-1 text-center">
            <h1 class="text-sm md:text-lg font-bold whitespace-nowrap">Universidad Autónoma de San Luis Potosí</h1>
        </div>

        <!-- Perfil y Fecha -->
        <div class="flex items-center gap-2 md:gap-4 pr-3 md:pr-6">
            <x-perfil-button class="hidden sm:block">
                Jaime Federico Meade Collins
            </x-perfil-button>
            <x-fecha></x-fecha>
        </div>
    </div>

    <div class="bg-blue-500 h-2 md:h-3"></div>
</header>
