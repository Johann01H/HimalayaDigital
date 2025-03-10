<?php

namespace App\Http\Controllers\Desarrollo\Foros\CreacionTareas;

use App\Models\Ots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;
class tareaController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::all();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Foro.crearTarea',compact('nameRoute','tareas'));
    }

    /**
     * Find the project or order number.
     */

    public function search(Request $request)
    {
        $query = $request->input('q'); // Recibir el texto de búsqueda

        $proyectos = Ots::where('referencia', 'LIKE', "%{$query}%")
                        ->orWhere('nombre', 'LIKE', "%{$query}%")
                        ->limit(10)
                        ->get(['referencia', 'nombre']); // Solo traer los datos necesarios

        return response()->json($proyectos);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
