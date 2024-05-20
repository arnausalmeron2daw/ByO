<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    function index()
    {
        return view('registerUser');
    }

    function store(Request $request)
    {
        if ($request->has(['name', 'email', 'password', 'repeatPassword'])) {
            $password = $request->input('password');
            $repeatPassword = $request->input('repeatPassword');

            if ($password === $repeatPassword) {
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($password); // Asegúrate de encriptar la contraseña antes de guardarla
                $user->save();

                return redirect()->route('loginUser.index')->with('success', 'Usuario registrado exitosamente.');
            } else {
                return back()->with('error', 'Las contraseñas no coinciden.');
            }
        } else {
            echo "Los datos no van";
        }

    }

}
