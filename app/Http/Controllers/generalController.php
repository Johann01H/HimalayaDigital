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
        $usuarios = User::all();
        $nameRoute = Route::currentRouteName();
        $userAuthenticate = User::findOrFail($id);
        return view('Desarrollo.Home.profileDesarrollo',compact('nameRoute','userAuthenticate','usuarios'));

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
