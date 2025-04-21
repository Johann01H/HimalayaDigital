<?php

namespace App\Http\Controllers\Desarrollo\Clientes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cliente;

class clientesController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Clientes.clientes',compact('nameRoute'));
    }


   /**
     * Get all clientes data.
     */
    public function apiClientes()
    {
        $clientes = Cliente::with('contratos')->get();
        return response()->json(['data' => $clientes]);
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
