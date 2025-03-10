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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $roleUser = Auth::user()->roles_id;

            switch ($roleUser) {
                case 1:
                    return redirect()->route('Página principal');
                case 3:
                    return redirect()->route('Home Administrador');
                case 4:
                    return redirect()->route('Home Colaborador');
            }
        }

        return redirect()->route('login')->with('loginError', 'Las credenciales ingresadas no son correctas. Verifica tu correo y contraseña e intenta nuevamente.');
    }


}

