document.addEventListener('DOMContentLoaded', () => {
    const temasInput = document.getElementById('tema');
    const subtemasInput = document.getElementById('subtema');

    const temasSeleccionados = new Set();
    const subtemasSeleccionados = {};

    document.querySelectorAll('#temas-ul > li').forEach(temaItem => {
        const temaName = temaItem.dataset.tema;
        const temaSpan = temaItem.querySelector('span');

        temaSpan.addEventListener('click', () => {
            if (temasSeleccionados.has(temaName)) {
                temasSeleccionados.delete(temaName);
                delete subtemasSeleccionados[temaName];

                // Restaurar color original del tema y sus subtemas
                temaSpan.classList.remove('bg-red-700');
                temaItem.querySelectorAll('ul > li').forEach(subtemaItem => {
                    subtemaItem.classList.remove('bg-red-300');
                });
            } else {
                temasSeleccionados.add(temaName);
                subtemasSeleccionados[temaName] = [];
                temaSpan.classList.add('bg-red-700');
            }
            updateInputs();
        });

        temaItem.querySelectorAll('ul > li').forEach(subtemaItem => {
            const subtemaName = subtemaItem.dataset.subtema;

            subtemaItem.addEventListener('click', () => {
                if (temasSeleccionados.has(temaName)) {
                    if (subtemasSeleccionados[temaName].includes(subtemaName)) {
                        subtemasSeleccionados[temaName] = subtemasSeleccionados[temaName].filter(st => st !== subtemaName);
                        subtemaItem.classList.remove('bg-red-300');
                    } else {
                        subtemasSeleccionados[temaName].push(subtemaName);
                        subtemaItem.classList.add('bg-red-300');
                    }
                    updateInputs();
                } else {
                    alert(`Selecciona primero el tema: ${temaName}`);
                }
            });
        });
    });

    function updateInputs() {
        temasInput.value = Array.from(temasSeleccionados).join(', ');

        const subtemasList = [];
        for (const tema in subtemasSeleccionados) {
            if (subtemasSeleccionados[tema].length > 0) {
                subtemasList.push(`${tema}: ${subtemasSeleccionados[tema].join(', ')}`);
            }
        }
        subtemasInput.value = subtemasList.join('; ');
    }
});
