<x-esqueleto>
    <x-nav-bar></x-nav-bar>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Registro de Actividad</h1>

        <!-- Botón para abrir el filtro -->
        <div class="relative mb-4">
            <button id="filterButton" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Filtrar
            </button>

            <!-- Menú de filtros (oculto por defecto) -->
            <div id="filterMenu" class="absolute left-0 mt-2 w-64 bg-white border rounded-lg shadow-lg p-4 hidden">
                <h3 class="text-lg font-semibold mb-2">Filtros</h3>

                <label class="block text-gray-700">ID Docente:</label>
                <input type="text" id="filterDocente" class="w-full px-3 py-2 border rounded-lg mb-2" placeholder="Ej. 344255">

                <label class="block text-gray-700">Usuario:</label>
                <input type="text" id="filterUser" class="w-full px-3 py-2 border rounded-lg mb-2" placeholder="Ej. Juan Pérez">

                <label class="block text-gray-700">Fecha:</label>
                <input type="date" id="filterDate" class="w-full px-3 py-2 border rounded-lg mb-2">

                <label class="block text-gray-700">Grupo:</label>
                <input type="text" id="filterGrupo" class="w-full px-3 py-2 border rounded-lg mb-2" placeholder="Ej. 3A">

                <label class="block text-gray-700">Materia:</label>
                <input type="text" id="filterMateria" class="w-full px-3 py-2 border rounded-lg mb-2" placeholder="Ej. Matemáticas">

                <label class="block text-gray-700">Acción:</label>
                <input type="text" id="filterAccion" class="w-full px-3 py-2 border rounded-lg mb-2" placeholder="Ej. Inicio sesión">

                <button id="applyFilters" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Aplicar Filtros
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-blue-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">ID Actividad</th>
                        <th class="py-3 px-4 text-left">ID Docente</th>
                        <th class="py-3 px-4 text-left">Usuario</th>
                        <th class="py-3 px-4 text-left">Fecha y Hora</th>
                        <th class="py-3 px-4 text-left">Grupo</th>
                        <th class="py-3 px-4 text-left">Materia</th>
                        <th class="py-3 px-4 text-left">Acción</th>
                    </tr>
                </thead>
                <tbody id="logTable" class="text-black">
                    <tr>
                        <td class="py-3 px-4">1</td>
                        <td class="py-3 px-4">344255</td>
                        <td class="py-3 px-4">Juan Perez</td>
                        <td class="py-3 px-4">2025-02-02 15:30</td>
                        <td class="py-3 px-4">3A</td>
                        <td class="py-3 px-4">Matemáticas</td>
                        <td class="py-3 px-4">Inicio sesión</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="py-3 px-4">2</td>
                        <td class="py-3 px-4">344256</td>
                        <td class="py-3 px-4">Ana Gomez</td>
                        <td class="py-3 px-4">2025-02-02 15:45</td>
                        <td class="py-3 px-4">2B</td>
                        <td class="py-3 px-4">Física</td>
                        <td class="py-3 px-4">Actualizó perfil</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4">3</td>
                        <td class="py-3 px-4">344257</td>
                        <td class="py-3 px-4">Carlos Ramirez</td>
                        <td class="py-3 px-4">2025-02-02 16:00</td>
                        <td class="py-3 px-4">1C</td>
                        <td class="py-3 px-4">Química</td>
                        <td class="py-3 px-4">Subió un archivo</td>
                    </tr>
                </tbody>
            </table>
        </div>   
    </div>

    <!-- Script de JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterButton = document.getElementById("filterButton");
            const filterMenu = document.getElementById("filterMenu");
            const applyFilters = document.getElementById("applyFilters");

            filterButton.addEventListener("click", function() {
                filterMenu.classList.toggle("hidden");
            });

            document.addEventListener("click", function(event) {
                if (!filterButton.contains(event.target) && !filterMenu.contains(event.target)) {
                    filterMenu.classList.add("hidden");
                }
            });

            applyFilters.addEventListener("click", function() {
                const docenteFilter = document.getElementById("filterDocente").value.toLowerCase();
                const userFilter = document.getElementById("filterUser").value.toLowerCase();
                const dateFilter = document.getElementById("filterDate").value;
                const grupoFilter = document.getElementById("filterGrupo").value.toLowerCase();
                const materiaFilter = document.getElementById("filterMateria").value.toLowerCase();
                const accionFilter = document.getElementById("filterAccion").value.toLowerCase();

                const rows = document.querySelectorAll("#logTable tr");

                rows.forEach(row => {
                    const docenteCell = row.children[1].textContent.toLowerCase();
                    const userCell = row.children[2].textContent.toLowerCase();
                    const dateCell = row.children[3].textContent.split(" ")[0];
                    const grupoCell = row.children[4].textContent.toLowerCase();
                    const materiaCell = row.children[5].textContent.toLowerCase();
                    const accionCell = row.children[6].textContent.toLowerCase();

                    if ((docenteFilter && !docenteCell.includes(docenteFilter)) ||
                        (userFilter && !userCell.includes(userFilter)) ||
                        (dateFilter && dateCell !== dateFilter) ||
                        (grupoFilter && !grupoCell.includes(grupoFilter)) ||
                        (materiaFilter && !materiaCell.includes(materiaFilter)) ||
                        (accionFilter && !accionCell.includes(accionFilter))) {
                        row.style.display = "none";
                    } else {
                        row.style.display = "";
                    }
                });

                filterMenu.classList.add("hidden"); // Oculta el menú después de aplicar los filtros
            });
        });
    </script>
</x-esqueleto>
