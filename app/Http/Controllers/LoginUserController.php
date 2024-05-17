<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Asegúrate de importar el modelo User correctamente

class LoginUserController extends Controller
{
    function index()
    {
        return view('loginUser');
    }

    function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Obtener el usuario autenticado
            $user = Auth::user();

            // Guardar datos del usuario en la sesión
            $request->session()->put('user', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]);

            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Email o contraseña incorrectos.');
        }
    }

    private function setTallerSession($user)
    {

        session(['taller' => [
            'name' => $user->name,
            'email' => $user->email,
            'telefono' => $user->telefono,
            'location' => $user->location,
        ]]);
    }

    public function showTalleres()
    {
        // Obtener los primeros 12 talleres ordenados por id
        $talleres = Taller::orderBy('id')->limit(12)->get();

        // Pasar los talleres a la vista
        return view('dashboard', compact('talleres'));  
    }
}
