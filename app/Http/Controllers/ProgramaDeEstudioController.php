<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramaDeEstudioController extends Controller
{
    public function programa()
    {
        return view('programa');
    }
}
