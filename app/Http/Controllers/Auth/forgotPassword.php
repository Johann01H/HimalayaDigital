<?php

namespace App\Http\Controllers\Auth;

use App\Mail\forgotPassword as MailForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class forgotPassword
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nameRoute = \Route::currentRouteName();
        return view( 'login.forgotPassword',compact('nameRoute'));
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
    public function store(Request $request )
    {
        try {
            $message = [
                "email.required" => "El campo correo electrónico es obligatorio.",
                "email.email" => "Por favor, ingresa una dirección de correo electrónico válida.",
            ];

            $validateEmail = $request->validate([
                'email' => "required|email"
            ],$message);


            $emailUser = \App\Models\User::where('email', $request->email)->first();

            if($emailUser)
            {
                $token = Str::random(64);

                DB::table('password_resets')->updateOrInsert(['email' => $request->email],['token' => $token, 'created_at' => now()]);

                Mail::to($emailUser->email)->send(new MailForgotPassword($emailUser,$token));

                return redirect()->route('¿Olvidó su contraseña?')->with('successEmail', 'El correo de recuperación de contraseña se ha enviado correctamente. Por favor, revisa tu bandeja de entrada o la carpeta de correo no deseado. Si no recibes el correo en unos minutos, intenta nuevamente o contacta con soporte técnico.');
            }else{
                return redirect()->back()->with('errorEmail', 'No se encontró ningún usuario con ese correo electrónico.');
            }
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
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
