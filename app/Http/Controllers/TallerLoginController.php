<?php

namespace App\Http\Controllers;

use App\Models\Taller; // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TallerLoginController extends Controller
{
    public function index()
    {
        return view('tallerLogin');
    }

    function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Intentar autenticar manualmente utilizando el guard 'web'
        if (Auth::guard('web')->attempt($credentials)) {
            // El usuario ha iniciado sesión correctamente, ahora obtenemos su información del taller
            $user = Auth::user();
            session(['taller'=>['name' => $user->name,
                'email' => $user->email,
                'telefono'=>$user->telefono,
                'location'=>$user->location,
            ]]);

            // Pasar la información del taller a la vista
            return redirect()->route('tallerMain.index');
        } else {
            // Verificar el hash de la contraseña ingresada con el hash almacenado
            $user = Taller::where('email', $credentials['email'])->first();
        
            if ($user && password_verify($credentials['password'], $user->password)) {
                // Las contraseñas coinciden
                Auth::guard('web')->login($user);

                // El usuario ha iniciado sesión correctamente, ahora obtenemos su información del taller
                
                session(['taller'=>['name' => $user->name,
                    'email' => $user->email,
                    'telefono'=>$user->telefono,
                    'location'=>$user->location,
                ]]);
                // Pasar la información del taller a la vista
                return redirect()->route('tallerMain.index');
            } else {
                // Las contraseñas no coinciden
                return back()->with('error', 'Email o contraseña incorrectos.');
            }
        }
    }
}
