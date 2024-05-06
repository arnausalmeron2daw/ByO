<?php

namespace App\Http\Controllers;
use App\Models\User; // Asegúrate de importar el modelo User correctamente
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Email o contraseña incorrectos.');
        }
    }
}
