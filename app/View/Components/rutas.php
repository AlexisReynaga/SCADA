<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Request;

class rutas extends Component
{
    public $rutas;

    public function __construct()
    {
        $this->rutas = $this->GenerarRutas();
    }

    private function GenerarRutas()
    {
        $segments = Request::segments();
        $rutas = [];

        $url = "";
        foreach ($segments as $segment) {
            $url .= "/" . $segment;
            $rutas[] = [
                'name' => ucfirst(str_replace('-', ' ', $segment)), // Convierte el nombre en formato legible
                'url' => url($url)
            ];
        }

        return $rutas;
    }
    public function render(): View|Closure|string
    {
        return view('components.rutas');
    }
}
