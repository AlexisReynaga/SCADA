<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calendarioController extends Controller
{
    public function calendario()
    {
        return view('calendario_clases');
    }
}
