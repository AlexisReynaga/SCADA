let contadorTemas = 0; // Contador de temas

function agregarTema() {
    const temasContainer = document.getElementById('temas-container');
    contadorTemas++; // Incrementar el contador de temas
    const temaIndex = contadorTemas; // Usar el contador para la numeración

    const temaDiv = document.createElement('div');
    temaDiv.classList.add('bg-gray-200', 'p-4', 'rounded-lg', 'mt-4', 'shadow');
    temaDiv.id = `tema-${temaIndex}`;

    temaDiv.innerHTML = `
        <h3 class="font-bold text-lg text-blue-700 mb-2">Tema ${temaIndex}:</h3>
        <input type="text" class="border border-gray-300 rounded-lg w-full p-2 mb-2" placeholder="Ingrese un tema">
        
        <div id="subtemas-container-${temaIndex}" class="ml-4"></div>

        <button type="button" onclick="agregarSubtema(${temaIndex})" class="mt-2 bg-blue-700 text-white font-bold py-1 px-3 rounded-lg hover:bg-blue-500">
            Agregar Subtema
        </button>

        <button type="button" onclick="eliminarElemento('tema-${temaIndex}')" class="mt-2 bg-red-600 text-white font-bold py-1 px-3 rounded-lg hover:bg-red-400">
            Eliminar Tema
        </button>
    `;

    temasContainer.appendChild(temaDiv);
}

function agregarSubtema(temaIndex) {
    const subtemasContainer = document.getElementById(`subtemas-container-${temaIndex}`);
    const subtemaIndex = subtemasContainer.children.length + 1;

    const subtemaDiv = document.createElement('div');
    subtemaDiv.classList.add('bg-gray-100', 'p-3', 'rounded-lg', 'mt-2', 'shadow', 'ml-4');
    subtemaDiv.id = `subtema-${temaIndex}-${subtemaIndex}`;

    subtemaDiv.innerHTML = `
        <h4 class="font-bold text-md text-blue-600 mb-1">Subtema ${subtemaIndex}:</h4>
        <input type="text" class="border border-gray-300 rounded-lg w-full p-2 mb-2" placeholder="Ingrese un subtema">

        <div id="subsubtemas-container-${temaIndex}-${subtemaIndex}" class="ml-4"></div>

        <button type="button" onclick="agregarSubSubtema(${temaIndex}, ${subtemaIndex})" class="mt-2 bg-blue-700 text-white font-bold py-1 px-3 rounded-lg hover:bg-blue-500">
            Agregar Sub-Subtema
        </button>

        <button type="button" onclick="eliminarElemento('subtema-${temaIndex}-${subtemaIndex}')" class="mt-2 bg-red-600 text-white font-bold py-1 px-3 rounded-lg hover:bg-red-400">
            Eliminar Subtema
        </button>
    `;

    subtemasContainer.appendChild(subtemaDiv);
}

function agregarSubSubtema(temaIndex, subtemaIndex) {
    const subsubtemasContainer = document.getElementById(`subsubtemas-container-${temaIndex}-${subtemaIndex}`);
    const subsubtemaIndex = subsubtemasContainer.children.length + 1;

    const subsubtemaDiv = document.createElement('div');
    subsubtemaDiv.classList.add('bg-gray-50', 'p-2', 'rounded-lg', 'mt-1', 'shadow', 'ml-4');
    subsubtemaDiv.id = `subsubtema-${temaIndex}-${subtemaIndex}-${subsubtemaIndex}`;

    subsubtemaDiv.innerHTML = `
        <h5 class="font-bold text-sm text-blue-700 mb-1">Sub-Subtema ${subsubtemaIndex}:</h5>
        <input type="text" class="border border-gray-300 rounded-lg w-full p-2 mb-2" placeholder="Ingrese un sub-subtema">

        <button type="button" onclick="eliminarElemento('subsubtema-${temaIndex}-${subtemaIndex}-${subsubtemaIndex}')" class="mt-2 bg-red-600 text-white font-bold py-1 px-3 rounded-lg hover:bg-red-400">
            Eliminar Sub-Subtema
        </button>
    `;

    subsubtemasContainer.appendChild(subsubtemaDiv);
}

function eliminarElemento(id) {
    const elemento = document.getElementById(id);
    if (elemento) {
        elemento.remove();
    }
}
