<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function bitacora()
    {
        return view('bitacora');
    }
}
