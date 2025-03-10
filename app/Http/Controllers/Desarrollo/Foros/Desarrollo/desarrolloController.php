<?php

namespace App\Http\Controllers\Desarrollo\Foros\Desarrollo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;
class desarrolloController
{
    public function index()
    {
        $desarrollos = Tarea::where('areas_id',3)->get();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_desarrollo', compact('nameRoute','desarrollos'));
    }
}
