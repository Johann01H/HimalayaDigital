<?php

namespace App\Http\Controllers\Desarrollo\Foros\DigitalPerformance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;
class digitalController
{
    public function index()
    {
        $perfomans = Tarea::where('areas_id', 5)->get();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_desarrollo_di_performance',compact('nameRoute','perfomans'));
    }
}
