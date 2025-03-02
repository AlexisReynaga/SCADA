document.getElementById('add-tema').addEventListener('click', function() {
    var temaContainer = document.getElementById('temas-container');
    var temaIndex = temaContainer.children.length;  // Obtener el número de temas actuales.
    
    var newTema = document.createElement('div');
    newTema.classList.add('tema', 'mb-4');
    
    // Crear el HTML para un nuevo tema y subtema con el botón de eliminación.
    newTema.innerHTML = `
        <div class="flex justify-between items-center">
            <input 
                type="text" 
                name="temas[]" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                placeholder="Ingrese un tema" 
                required
            />
            <button type="button" class="remove-tema bg-red-500 text-white px-2 py-1 ml-2 rounded-lg">Eliminar</button>
        </div>
        
        <div class="subtemas mt-2 flex justify-between items-center">
            <input 
                type="text" 
                name="subtemas[${temaIndex}][]" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" 
                placeholder="Ingrese un subtema"
                required
            />
            <button type="button" class="remove-subtema bg-red-500 text-white px-2 py-1 ml-2 rounded-lg">Eliminar</button>
        </div>
    `;
    
    // Agregar el nuevo tema al contenedor
    temaContainer.appendChild(newTema);
    
    // Manejador para eliminar el tema
    newTema.querySelector('.remove-tema').addEventListener('click', function() {
        temaContainer.removeChild(newTema);
    });
    
    // Manejador para eliminar el subtema
    newTema.querySelector('.remove-subtema').addEventListener('click', function() {
        var subtemasContainer = newTema.querySelector('.subtemas');
        subtemasContainer.removeChild(subtemasContainer.querySelector('input'));
        subtemasContainer.removeChild(subtemasContainer.querySelector('.remove-subtema'));
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