<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use App\Jobs\updateImage;
class generalController
{

    public function homeAdministrador()
    {
        $nameRoute = Route::currentRouteName();
        return view('Administrador.' , compact('nameRoute'));

    }

    public function homeDevelopment()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Home.homeDesarrollo' , compact('nameRoute'));
    }

    public function showProfileUser($id)
    {
        $nameRoute = Route::currentRouteName();
        $userAuthenticate = User::select([
            'users.id', 'users.nombre', 'users.apellido', 'users.email', 
            'users.img_perfil', 'users.direccion', 'users.telefono', 
            'users.numero_referencia','users.fecha_nacimiento', 
            'roles.id as role_id', 'roles.nombre as role_name', 
            'areas.id as area_id', 'areas.nombre as area_name'
        ])
        ->leftJoin('roles', 'users.roles_id', '=', 'roles.id')
        ->leftJoin('areas', 'users.areas_id', '=', 'areas.id')
        ->where('users.id', $id)
        ->firstOrFail();
    
        return view('Desarrollo.Home.profileDesarrollo',compact('nameRoute','userAuthenticate'));

    }

    public function updateImage(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        dd($data);


        $imagenPath = $request->file('image')->store('imagenes_temporales');

        $nuevoNombre = time() .'.jpg';

        updateImage::dispatch($$imagenPath, $nuevoNombre);

    }

}
