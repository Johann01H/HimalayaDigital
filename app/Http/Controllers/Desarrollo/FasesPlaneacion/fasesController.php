<?php

namespace App\Http\Controllers\Desarrollo\FasesPlaneacion;

use App\Models\Planeacion_tipos;
use Illuminate\Http\Request;
use App\Models\Planeacion_fases;
use Illuminate\Support\Facades\Route;
class fasesController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fases = Planeacion_fases::all();
        $nameRoute = Route::currentRouteName();
        return view('desarrollo.herramientas.fases_planeacion.fases_planeacion', compact('nameRoute','fases'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $planeaciones = Planeacion_tipos::all();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Herramientas.Fases_planeacion.crear_fase', compact('nameRoute','planeaciones'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [

            'nm-fase.required' => 'El nombre de la fase es obligatorio.',
            'nm-fase.string' => 'El nombre de la fase debe ser un texto válido.',
            'nm-fase.max' => 'El nombre de la fase no puede tener más de 80 caracteres.',

            'tp-planeacion.required' => 'El tipo de planeación es obligatorio.',
            'tp-planeacion.exists' => 'El tipo de planeación seleccionado no es válido o no existe.',

        ];

        $validateData = $request->validate([
            'nm-fase' => 'required|string|max:80',
            'tp-planeacion' => 'required|exists:planeacion_fases,planeaciones_tipos_id'
        ],$message);


        $fase_planeacion = Planeacion_fases::create([
            'nombre' => $validateData['nm-fase'],
            'planeaciones_tipos_id' => $validateData['tp-planeacion']
        ]);

        if($fase_planeacion){
            return redirect()->route('Fase del proyecto')->with([
                'faseSuccess' => 'Fase creada con éxito',
                'type' => 'success',
                'modalShow' => true
            ]);
        }else{
            return redirect()->back()->with([
                'faseError' => 'Hubo un problema al crear la fase de planeación. Inténtalo nuevamente.',
                'type' => "danger",
                'modelShow' => true
            ]);
        }
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
        $planeaciones = Planeacion_fases::all();
        $fase_planeacion = Planeacion_fases::findOrFail($id);
        $nameRoute = Route::currentRouteName();

        return view('Desarrollo.Herramientas.Fases_planeacion.actualilzar_fases', compact('nameRoute','fase_planeacion','planeaciones'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = [
            'nmu-fase.required' => 'El nombre de la fase es obligatorio.',
            'nmu-fase.string' => 'El nombre de la fase debe ser un texto válido.',
            'nmu-fase.max' => 'El nombre de la fase no puede tener más de 80 caracteres.',

            'tpu-planeacion.required' => 'El tipo de planeación es obligatorio.',
            'tpu-planeacion.exists' => 'El tipo de planeación seleccionado no es válido o no existe.',
        ];

        $validateData = $request->validate([
            'nmu-fase' => 'required|string|max:80',
            'tpu-planeacion' => 'required|exists:planeacion_fases,planeaciones_tipos_id'
        ],$message);


        $fase_planeacion = Planeacion_fases::findOrFail($id);

        $fase_planeacion->update([
            'nombre' => $validateData['nmu-fase'],
            'planeaciones_tipos_id' => $validateData['tpu-planeacion'],
        ]);

        if($fase_planeacion)
        {
            return redirect()->route('Fase del proyecto')->with([
                'updateFaseSuccess' => 'La fase de planeación se actualizó correctamente.',
                'type' => 'success',
                'modalShow' => true
            ]);
        }else{
            return redirect()->back()->with([
                'updateErrorSuccess' => 'La fase de planeación no se actualizó correctamente.',
                'type' => 'danger',
                'modalShow' => true
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
