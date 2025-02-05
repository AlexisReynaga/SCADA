<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCADA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<header class="text-white">
    <div class="bg-blue-800 flex justify-between items-center p-5">
        <div class="flex items-center gap-4 pl-6"> 
            <img src="{{ asset('images/UASLP.png') }}" alt="UASLP" class="h-12 ml-6"> 
        </div>
        <div class="flex-1 text-center">
            <h1 class="text-lg font-bold">Universidad Autónoma de San Luis Potosí</h1>
        </div>
        <div class="flex items-center gap-4">
            <x-perfil-button>
                Jaime Federico Meade Collins
            </x-perfil-button>
            <x-fecha></x-fecha>
        </div>
    </div>
    <div class="bg-blue-500 h-3"></div>
</header>

{{$slot}}
            </div>
        </div>
    </main>
</body>
<footer class="bg-blue-900 text-white py-10">
    <div class="container mx-auto px-6 md:px-12 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo y Descripción -->
            <div>
                <h2 class="text-2xl font-bold">SCADA</h2>
                <p class="mt-2 text-gray-400">
                    Un sistema innovador para el monitoreo y control eficiente de procesos industriales.
                </p>
            </div>

            <!-- Enlaces Rápidos -->
            <div>
                <h3 class="text-lg font-semibold">Enlaces</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Inicio</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Nosotros</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Servicios</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Contacto</a></li>
                </ul>
            </div>

            <!-- Redes Sociales -->
            <div>
                <h3 class="text-lg font-semibold">Síguenos</h3>
                <div class="mt-2 flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Línea Divisoria -->
        <div class="mt-8 border-t border-gray-700 pt-4 text-center text-gray-400 text-sm">
            © 2025 SCADA. Todos los derechos reservados.
        </div>
    </div>
</footer>

</html>
