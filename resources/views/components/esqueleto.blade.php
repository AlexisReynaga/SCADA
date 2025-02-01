<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCADA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<header class="bg-blue-900 text-white flex justify-between items-center p-4">
    <div class="flex items-center gap-4 ">
        <img src="{{ asset('images/UASLP.png') }}" alt="UASLP" class="h-12">
    </div>
    <div class="flex-1 text-center pl-64">
        <h1 class="text-lg font-bold">Universidad Autónoma de San Luis Potosí</h1>
    </div>
    <div class="flex items-center gap-4">
        <x-perfil-button>
            Jaime Federico Meade Collins
        </x-perfil-button>
        <x-fecha></x-fecha>
    </div>
</header>
{{$slot}}
            </div>
        </div>
    </main>
</body>
</html>
