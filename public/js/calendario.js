document.addEventListener("DOMContentLoaded", function() {
    // Obtener el año actual
    const currentYear = new Date().getFullYear();

    // Definir los periodos de los semestres en función del año actual
    const semestres = {
        primero: { 
            // Primer semestre: 20 de enero a 30 de mayo del año actual
            inicio: new Date(currentYear, 0, 20),  // 0 = Enero
            fin: new Date(currentYear, 4, 30)      // 4 = Mayo
        },
        segundo: { 
            // Segundo semestre: 20 de agosto a 10 de diciembre del año actual
            inicio: new Date(currentYear, 7, 20),  // 7 = Agosto
            fin: new Date(currentYear, 11, 10)     // 11 = Diciembre
        }
    };

    let semestreActual = 'primero'; // Semestre actual

    const calendarContainer = document.getElementById("calendar");
    const filterMonth = document.getElementById("filterMonth");
    const pastDaysButton = document.getElementById("pastDays");
    const futureDaysButton = document.getElementById("futureDays");

    // Extraer la URL de sesión correctamente
    const sesionUrl = calendarContainer.getAttribute("data-url");

    if (!sesionUrl) {
        console.error("No se pudo obtener la URL de sesión.");
        return;
    }

    let filterState = { month: null, past: false, future: false };

    function generarCalendario() {
        // Limpiar calendario antes de regenerarlo
        calendarContainer.innerHTML = `
            <div class="text-center font-bold text-blue-900 text-xs sm:text-sm md:text-base">Lunes</div>
            <div class="text-center font-bold text-blue-900 text-xs sm:text-sm md:text-base">Martes</div>
            <div class="text-center font-bold text-blue-900 text-xs sm:text-sm md:text-base">Miércoles</div>
            <div class="text-center font-bold text-blue-900 text-xs sm:text-sm md:text-base">Jueves</div>
            <div class="text-center font-bold text-blue-900 text-xs sm:text-sm md:text-base">Viernes</div>
        `;

        const { inicio, fin } = semestres[semestreActual];
        const hoy = new Date(); // Fecha actual
        let fecha = new Date(inicio);
        hoy.setHours(0, 0, 0, 0);

        while (fecha <= fin) {
            if (
                (filterState.month === null || fecha.getMonth() === filterState.month) && // Filtrar por mes
                (filterState.past && fecha < hoy || filterState.future && fecha > hoy || !filterState.past && !filterState.future)
            ) {
                let diaSemana = fecha.getDay(); // 0 = Domingo, 1 = Lunes, ..., 6 = Sábado
                if (diaSemana >= 1 && diaSemana <= 5) { // Solo días hábiles (Lunes a Viernes)
                    const diaTexto = fecha.toLocaleDateString('es-ES', { day: '2-digit', month: 'long', year: 'numeric' });

                    // Determinar color de fondo según la fecha
                    let bgColor = "bg-white"; // Predeterminado (futuro)
                    if (fecha < hoy) {
                        bgColor = "bg-red-400"; // Pasado
                    } else if (fecha.getTime() === hoy.getTime()) {
                        bgColor = "bg-green-400"; // Día actual
                    }

                    let diaElemento = document.createElement("div");
                    diaElemento.className = `p-4 md:p-6 ${bgColor} shadow-md rounded-lg text-center transition-all duration-2000`;
                    diaElemento.innerHTML = `
                        <p class="text-gray-700 font-bold text-xs md:text-base">${diaTexto}</p>
                        <a href="${sesionUrl}">
                            <button class="w-full sm:w-auto p-2 mt-2 bg-blue-800 text-white rounded-lg hover:bg-blue-500 transition-all duration-[300ms] ease-in-out text-xs md:text-sm">
                                Sesión
                            </button>
                        </a>
                    `;
                    calendarContainer.appendChild(diaElemento);
                }
            }
            // Pasar al siguiente día
            fecha.setDate(fecha.getDate() + 1);
        }
    }

    // Filtrado por mes
    filterMonth.addEventListener("change", (event) => {
        filterState.month = event.target.value ? parseInt(event.target.value) : null;
        generarCalendario();
    });

    // Filtrado por días pasados
    pastDaysButton.addEventListener("click", () => {
        filterState.past = true;
        filterState.future = false;
        generarCalendario();
    });

    // Filtrado por días futuros
    futureDaysButton.addEventListener("click", () => {
        filterState.past = false;
        filterState.future = true;
        generarCalendario();
    });

    // Botón para cambiar de semestre
    document.getElementById("toggleSemester").addEventListener("click", () => {
        semestreActual = semestreActual === 'primero' ? 'segundo' : 'primero';
        generarCalendario();
    });

    // Generar calendario inicial
    generarCalendario();
});
