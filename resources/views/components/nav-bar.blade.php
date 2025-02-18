<!-- Botón para abrir/cerrar -->
<button id="toggleSidebar" class="fixed top-2 left-0 bg-blue-800 text-white p-3 rounded z-50 transition-all">☰</button>

<!-- Overlay -->
<div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

<div class="flex">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 w-64 bg-blue-800 text-white h-screen p-5 transition-transform transform -translate-x-full z-50">
        <h2 class="text-xl font-semibold">Menú</h2>
        <ul class="mt-4 space-y-2">
            <li><a href="{{ route('home') }}" class="block p-2 hover:bg-blue-500 rounded">Inicio</a></li>
            <li><a href="{{ route('home.perfil') }}" class="block p-2 hover:bg-blue-500 rounded">Perfil</a></li>
            <!--unicamente al rol de admin le aparecera la vista de la bitacora y programas de estudio (cambiarlo
            por el de becario y coordinadores de area-->
            @if(auth()->user()->rol === 'admin')
                <li><a href="{{ route('home.bitacora') }}" class="block p-2 hover:bg-blue-500 rounded">Bitácora</a></li>
                <li><a href="{{ route('home.programa')}}" class="block p-2 hover:bg-blue-500 rounded">Programas de estudio</a></li>
            @endif
            <li><a href="{{ route('home.materias')}}" class="block p-2 hover:bg-blue-500 rounded">Materias</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left block p-2 hover:bg-red-500 rounded">
                        Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggleSidebar");
        const overlay = document.getElementById("overlay");

        toggleButton.addEventListener("click", function () {
            sidebar.classList.toggle("-translate-x-full");
            overlay.classList.toggle("hidden");
        });

        overlay.addEventListener("click", function () {
            sidebar.classList.add("-translate-x-full");
            overlay.classList.add("hidden");
        });
    });
</script>
