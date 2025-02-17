<nav class="bg-gray-100 p-3 rounded-lg">
    <ol class="flex text-sm text-gray-600 space-x-2">
        <li>
            <a href="{{ url('home') }}" class="text-blue-600 hover:underline">Inicio</a>
        </li>
        @foreach ($rutas as $index => $ruta)
            <li>/</li>
            <li>
                @if ($index !== count($rutas) - 1)
                    <a href="{{ $ruta['url'] }}" class="text-blue-600 hover:underline">
                        {{ $ruta['name'] }}
                    </a>
                @else
                    <span class="text-gray-500">{{ $ruta['name'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
