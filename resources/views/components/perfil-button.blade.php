@auth
    <button type="button" onclick="window.location='{{ route('perfil') }}'" 
        class="text-white hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
        {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
    </button>
@endauth
