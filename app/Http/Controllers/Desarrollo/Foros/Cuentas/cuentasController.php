<?php

namespace App\Http\Controllers\Desarrollo\Foros\Cuentas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;
class cuentasController
{
    public function index()
    {
        $cuentas = Tarea::where('areas_id',6)->get();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.foro_desarrollo_cuentas',compact('nameRoute','cuentas'));
    }
}
