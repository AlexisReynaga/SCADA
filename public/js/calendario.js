// Periodos de los semestres
        const semestres = {
            primero: { inicio: new Date(2025, 0, 20), fin: new Date(2025, 4, 30) }, // 20 Ene - 30 May
            segundo: { inicio: new Date(2025, 7, 20), fin: new Date(2025, 11, 10) } // 20 Ago - 10 Dic
        };
    
        let semestreActual = 'primero'; // Iniciamos con el primer semestre
    
        function generarCalendario() {
            const calendarContainer = document.getElementById("calendar");
    
            // Limpiar calendario antes de regenerarlo
            calendarContainer.innerHTML = `
                <div class="text-center font-bold text-gray-900">Lunes</div>
                <div class="text-center font-bold text-gray-900">Martes</div>
                <div class="text-center font-bold text-gray-900">Miércoles</div>
                <div class="text-center font-bold text-gray-900">Jueves</div>
                <div class="text-center font-bold text-gray-900">Viernes</div>
            `;
            
            const { inicio, fin } = semestres[semestreActual];
            const hoy = new Date(); // Fecha actual
            let fecha = new Date(inicio);
            hoy.setHours(0, 0, 0, 0);

            while (fecha <= fin) {
                let diaSemana = fecha.getDay(); // 0 = Domingo, 1 = Lunes, ..., 6 = Sábado
    
                if (diaSemana >= 1 && diaSemana <= 5) { // Solo días hábiles (Lunes a Viernes)
                    const diaTexto = fecha.toLocaleDateString('es-ES', { day: '2-digit', month: 'long', year: 'numeric' });
    
                    // Determinar color de fondo según la fecha
                    let bgColor = "bg-white"; // Predeterminado (futuro)
                    if (fecha < hoy) {
                        bgColor = "bg-gray-400"; // Pasado
                    } else if (fecha.getTime() === hoy.getTime()) {
                        bgColor = "bg-blue-400"; // Día actual
                    }
                    
                    // Crear celda
                    let diaElemento = document.createElement("div");
                    diaElemento.className = `p-4 ${bgColor} shadow-md rounded-lg text-center transition-all duration-300`;
                    diaElemento.innerHTML = `
                        <p class="text-gray-700 font-bold">${diaTexto}</p>
                        <button class="w-full p-2 mt-2 bg-blue-900 text-white rounded-lg hover:bg-blue-700 transition-all duration-250">
                            Sesión
                        </button>
                    `;
                    calendarContainer.appendChild(diaElemento);
                }
    
                // Pasar al siguiente día
                fecha.setDate(fecha.getDate() + 1);
            }
        }
    
        // Botón para cambiar de semestre
        document.getElementById("toggleSemester").addEventListener("click", () => {
            semestreActual = semestreActual === 'primero' ? 'segundo' : 'primero';
            generarCalendario();
        });
    
        // Generar calendario inicial
        generarCalendario();