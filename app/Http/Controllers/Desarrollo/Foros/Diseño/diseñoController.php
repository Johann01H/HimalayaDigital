<?php

namespace App\Http\Controllers\Desarrollo\Foros\Diseño;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;
class diseñoController
{
    public function index(){
        $nameRoute = Route::currentRouteName();
        $diseños = Tarea::where('areas_id', 2)->with('ots','estados','areas','users','planeaciones_fases')->get();
        return view('Desarrollo.Foro.foro_desarrollo_diseño', compact('nameRoute','diseños'));
    }

}
