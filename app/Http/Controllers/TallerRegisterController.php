<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorarioTaller;
use Illuminate\Support\Facades\Session;
use App\Models\Taller; // Asegúrate de importar el modelo correcto

class TallerRegisterController extends Controller
{
    public function index()
    {
        return view('tallerRegister');
    }

    public function store(Request $request)
    {
        // Verificar si los campos requeridos están presentes en la solicitud
        if ($request->has(['name', 'email', 'password', 'repeatPassword', 'telefono'])) {


            $password = $request->input('password');
            $repeatPassword = $request->input('repeatPassword');

            // Verificar si las contraseñas coinciden
            if ($password === $repeatPassword) {
                // Crear una nueva instancia del modelo Taller
                $taller = new Taller();
                $taller->name = $request->input('name');
                $taller->email = $request->input('email');
                $taller->telefono=$request->input('telefono');
                $taller->location=$request->input('location');
                $taller->numEmpleados=$request->input('cantidad');
                $taller->password = bcrypt($password); // Encriptar la contraseña antes de guardarla
                $taller->save(); // Guardar el taller en la base de datos

                $id = $taller->id; // Obtener el ID del taller guardado
                $name= $taller->name;
                Session::put('id', $id); // Guardar el ID en la sesión
                Session::put('name', $name);

                Session::put('Taller', $taller);

                
                return redirect()->route('tallerHorarios.index');
            } else {
                return back()->withErrors(['repeatPassword' => 'Las contraseñas no coinciden']);
            }
        } else {

            return back()->withErrors(['general' => 'Faltan datos en el formulario']);
        }
    }



}
