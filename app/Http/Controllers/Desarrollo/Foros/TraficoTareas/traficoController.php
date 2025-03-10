<?php

namespace App\Http\Controllers\Desarrollo\Foros\TraficoTareas;

use App\Models\Tarea;
use App\Models\Trafico_tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class traficoController
{
    public function index()
    {
        $traficos = Tarea::all();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_traficotareas',compact('nameRoute','traficos'));
    }
}
