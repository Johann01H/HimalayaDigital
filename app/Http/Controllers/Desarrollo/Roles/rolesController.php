<?php

namespace App\Http\Controllers\Desarrollo\Roles;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
class rolesController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Roles = Role::select(['id','display_name','descripcion'])->get();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Roles.foro_roles',compact('nameRoute','Roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Roles.roles_create',compact('nameRoute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = [
            'nm-lo.required' => 'El campo lógico Local es obligatorio.',
            'nm-lo.max' => 'No debe exceder los 255 caracteres.',
            'nm-mo.required' => 'El campo Nombre Modelo es obligatorio.',
            'nm-mo.max' => ' No debe exceder los 255 caracteres.',
            'dc-ion.required' => 'El campo Descripción es obligatorio.',
        ];

        $validateData = $request->validate([
            'nm-lo' => 'required|string|max:255',
            'nm-mo' => 'required|string|max:255',
            'dc-ion' => 'required|string',
        ], $messages);


        $roles = Role::create([
            'nombre' => $validateData['nm-lo'],
            'display_name' => $validateData['nm-mo'],
            'descripcion' => $validateData['dc-ion']
        ]);

        return redirect()->route('Roles')->with([
            'successRole' => '¡Rol creado exitosamente!',
            'modelShow' => true
        ]);
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
        $role = Role::findOrFail($id);
        $nameRoute = \Route::currentRouteName();
        return view('Desarrollo.Roles.roles_update',compact('nameRoute','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = [
            'nm-lou.required' => 'El campo lógico Local es obligatorio.',
            'nm-lou.max' => 'No debe exceder los 255 caracteres.',
            'nm-mou.required' => 'El campo Nombre Modelo es obligatorio.',
            'nm-mou.max' => ' No debe exceder los 255 caracteres.',
            'dc-ionu.required' => 'El campo Descripción es obligatorio.',
        ];
        $validateData = $request->validate([
            'nm-lou' => 'required|string|max:255',
            'nm-mou' => 'required|string|max:255',
            'dc-ionu' => 'required|string',
        ], $messages);

        $Role = Role::findOrFail($id);

        $Role->update([
             'nombre' => $validateData['nm-lou'],
             'display_name' => $validateData['nm-mou'],
             'descripcion' => $validateData['dc-ionu'],
         ]);



        return redirect()->route('Roles')->with([
            'successRoleUpdate' => '¡Datos del rol actualizados correctamente!',
            'modelShow' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
