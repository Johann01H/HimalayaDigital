<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
class loginController
{
    public function showLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'email.exists' => 'No encontramos un usuario con ese correo electrónico.',
        ];


        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], $messages);

        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');


        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route([
                1 => 'Página principal',
                2 => 'Home Administrador',
                3 => 'Home Colaborador',
            ][Auth::user()->roles_id] ?? 'login');

        } else {
            return redirect()->route('login')->with('loginError', 'Las credenciales ingresadas no son correctas. Verifique su correo y contraseña e intente nuevamente.');
        }
        ;
    }



}

