<?php

namespace App\Http\Controllers;

use App\Models\Taller; // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TallerRegisterController extends Controller
{
    public function index()
    {
        return view('tallerRegister');
    }

    public function store(Request $request)
    {
        // Verificar si los campos requeridos están presentes en la solicitud
        if ($request->has(['name', 'email', 'password', 'repeatPassword'])) {


            $password = $request->input('password');
            $repeatPassword = $request->input('repeatPassword');

            // Verificar si las contraseñas coinciden
            if ($password === $repeatPassword) {
                // Crear una nueva instancia del modelo Taller
                $taller = new Taller();
                $taller->name = $request->input('name');
                $taller->email = $request->input('email');
                $taller->password = bcrypt($password); // Encriptar la contraseña antes de guardarla
                $taller->save(); // Guardar el taller en la base de datos

                $id = $taller->id; // Obtener el ID del taller guardado

                Session::put('id', $id); // Guardar el ID en la sesión
                //dd($taller);
                // Redireccionar a una página de éxito o hacer algo más después de guardar los datos
                return redirect()->route('tallerRegister2.index');
            } else {
                return back()->withErrors(['repeatPassword' => 'Las contraseñas no coinciden']);
            }
        } else {

            return back()->withErrors(['general' => 'Faltan datos en el formulario']);
        }
    }
}
