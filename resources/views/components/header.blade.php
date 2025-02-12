<header class="text-white">
    <div class="bg-blue-800 flex flex-wrap items-center justify-between p-2 md:p-3">
        <!-- Logo -->
        <div class="hidden md:flex items-center gap-4 pl-3 md:pl-6""> 
            <img src="{{ asset('images/UASLP.png') }}" alt="UASLP" class="h-8 sm:h-10 md:h-12"> 
        </div>

        <!-- Nombre de la Universidad -->
        <div class="flex-1 text-center">
            <!-- Nombre completo en pantallas medianas y grandes -->
            <h1 class="hidden md:block text-lg font-bold whitespace-nowrap">
                Universidad Autónoma de San Luis Potosí
            </h1>
            <!-- Versión corta en dispositivos pequeños -->
            <h1 class="block md:hidden text-base font-bold">
                UASLP
            </h1>
        </div>
        <div class="flex items-center gap-2 sm:gap-4">
            <x-perfil-button>
            </x-perfil-button>
            <x-fecha></x-fecha>
        </div>
    </div>

    <div class="bg-blue-500 h-2 md:h-3"></div>
</header>
