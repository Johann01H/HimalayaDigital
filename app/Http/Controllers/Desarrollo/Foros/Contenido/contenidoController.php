<?php

namespace App\Http\Controllers\Desarrollo\Foros\Contenido;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;

use Illuminate\Http\Request;

class contenidoController
{
    public function index()
    {
        $contenidos = Tarea::where('areas_id',4)->get();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_desarrollo_contenido', compact('nameRoute','contenidos'));

    }
}
