<?php

namespace App\Http\Controllers\Desarrollo\Areas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Area;
class areasController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nameRoute = Route::currentRouteName();
        $areas = Area::all();
        return view('Desarrollo.Equipo.areas',compact('nameRoute','areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Equipo.crearAreas',compact('nameRoute'));
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
