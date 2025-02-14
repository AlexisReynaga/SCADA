<span id="fecha"></span>

<script>
    // Obtiene la fecha actual
    const fechaActual = new Date();

    // Formatea la fecha en el formato deseado (por ejemplo, "Jueves- 07-11-2024")
    const opciones = { weekday: 'long', day: '2-digit', month: '2-digit', year: 'numeric' };
    const fechaFormateada = fechaActual.toLocaleDateString('es-ES', opciones);

    // Asigna la fecha al contenido del span
    document.getElementById('fecha').textContent = fechaFormateada;
</script>
