// Periodos de los semestres
const semestres = {
    primero: { inicio: new Date(2025, 0, 20), fin: new Date(2025, 4, 30) }, // 20 Ene - 30 May
    segundo: { inicio: new Date(2025, 7, 20), fin: new Date(2025, 11, 10) } // 20 Ago - 10 Dic
};

let semestreActual = 'primero'; // Semestre actual

const calendarContainer = document.getElementById("calendar");
const filterMonth = document.getElementById("filterMonth");
const pastDaysButton = document.getElementById("pastDays");
const futureDaysButton = document.getElementById("futureDays");

// Extraer la URL de sesión correctamente
//arreglar el link cuando se tenga un dominio o algo para que no sea local
const sesionUrl = calendarContainer.getAttribute("data-url") || "http://127.0.0.1:8000/sesion";

let filterState = { month: null, past: false, future: false };

function generarCalendario() {
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
                diaElemento.className = `p-4 ${bgColor} shadow-md rounded-lg text-center transition-all duration-2000`;
                diaElemento.innerHTML = `
                    <p class="text-gray-700 font-bold">${diaTexto}</p>
                    <a href="${sesionUrl}">
                        <button class="w-full p-2 mt-2 bg-blue-800 text-white rounded-lg hover:bg-blue-500 transition-all duration-[300ms] ease-in-out">
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
