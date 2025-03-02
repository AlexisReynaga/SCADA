document.getElementById('add-tema').addEventListener('click', function() {
    var temaContainer = document.getElementById('temas-container');
    var temaIndex = temaContainer.children.length;  // Obtener el número de temas actuales.

    var newTema = document.createElement('div');
    newTema.classList.add('tema', 'mb-4');

    // Crear el HTML para un nuevo tema con el botón de eliminar.
    newTema.innerHTML = `
        <div class="flex justify-between items-center">
            <input 
                type="text" 
                name="temas[]" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                placeholder="Ingrese un tema" 
                required
            />
            <button type="button" class="remove-tema bg-red-500 text-white font-bold px-2 py-1 ml-2 rounded-lg">Eliminar</button>
            <button type="button" class="add-subtema bg-blue-700 text-white font-bold text-xs px-0 py-0 ml-2 rounded-lg">Agregar Subtema</button>
        </div>
        <div class="subtemas mt-2">
            <!-- Aquí se agregarán los subtemas -->
        </div>
    `;

    // Agregar el nuevo tema al contenedor
    temaContainer.appendChild(newTema);

    // Manejador para eliminar el tema junto con sus subtemas
    newTema.querySelector('.remove-tema').addEventListener('click', function() {
        temaContainer.removeChild(newTema);
    });

    // Manejador para agregar subtemas solo si el tema existe
    newTema.querySelector('.add-subtema').addEventListener('click', function() {
        var subtemasContainer = newTema.querySelector('.subtemas');

        // Crear un nuevo subtema con su respectivo botón de eliminación
        var newSubtema = document.createElement('div');
        newSubtema.classList.add('subtema-container', 'flex', 'justify-evenly', "mb-2", "mt-2");
        newSubtema.innerHTML = `
            <input 
                type="text" 
                name="subtemas[${temaIndex}][]" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-4/5 p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                placeholder="Ingrese un subtema"
                required
            />
            <button type="button" class="remove-subtema bg-red-500 text-white font-bold px-1 py-0 ml-2 rounded-lg">Eliminar</button>
        `;

        // Agregar el nuevo subtema al contenedor de subtemas
        subtemasContainer.appendChild(newSubtema);

        // Manejador para eliminar el subtema
        newSubtema.querySelector('.remove-subtema').addEventListener('click', function() {
            subtemasContainer.removeChild(newSubtema);
        });
    });
});

function seleccionarCarrera(carrera, botonSeleccionado, botonDeseleccionado) {
    // Actualizar el campo oculto
    document.getElementById('carrera').value = carrera;

    // Reiniciar el color del botón deseleccionado
    document.getElementById(botonDeseleccionado).classList.remove('bg-green-500');
    document.getElementById(botonDeseleccionado).classList.add(botonDeseleccionado === 'btnSistemasInteligentes' ? 'bg-blue-500' : 'bg-blue-700');

    // Aplicar el color resaltado al botón seleccionado
    document.getElementById(botonSeleccionado).classList.remove('bg-blue-500', 'bg-blue-700');
    document.getElementById(botonSeleccionado).classList.add('bg-green-500');
}