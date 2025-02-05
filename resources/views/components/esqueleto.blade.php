<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCADA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<header class="text-white">
    <div class="bg-blue-800 flex justify-between items-center p-5">
        <div class="flex items-center gap-4 pl-6"> 
            <img src="{{ asset('images/UASLP.png') }}" alt="UASLP" class="h-12 ml-6"> 
        </div>
        <div class="flex-1 text-center">
            <h1 class="text-lg font-bold">Universidad Autónoma de San Luis Potosí</h1>
        </div>
        <div class="flex items-center gap-4">
            <x-perfil-button>
                Jaime Federico Meade Collins
            </x-perfil-button>
            <x-fecha></x-fecha>
        </div>
    </div>
    <div class="bg-blue-500 h-3"></div>
</header>

{{$slot}}
            </div>
        </div>
    </main>
</body>
<x-footer></x-footer>
</html>
