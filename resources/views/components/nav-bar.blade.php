<!-- Botón para abrir/cerrar -->
<button id="toggleSidebar" class="fixed top-5 left-5 bg-blue-900 text-white p-2 rounded z-50 transition-all">☰</button>

<!-- Overlay -->
<div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

<div class="flex">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 w-64 bg-blue-900 text-white h-screen p-5 transition-transform transform -translate-x-full z-50">
        <h2 class="text-xl font-semibold">Menú</h2>
        <ul class="mt-4 space-y-2">
            <li><a href="{{ route('home') }}" class="block p-2 hover:bg-blue-800 rounded">Inicio</a></li>
            <li><a href="{{ route('perfil') }}" class="block p-2 hover:bg-blue-800 rounded">Perfil</a></li>
            <li><a href="{{ route('materias')}}" class="block p-2 hover:bg-blue-800 rounded">Materias</a></li>
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
