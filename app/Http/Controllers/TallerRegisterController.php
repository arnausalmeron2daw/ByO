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
        if ($request->has(['name', 'email', 'password', 'repeatPassword', 'telefono', 'location', 'cantidad', 'logo'])) {


            $password = $request->input('password');
            $repeatPassword = $request->input('repeatPassword');



            if ($password === $repeatPassword) {
               
                //CONVERTIR LA IMG A BASE64
                $image = $request->file('logo');
                $imagePath = $image->getPathName();
                $imageData = file_get_contents($imagePath);
                $base64Image = base64_encode($imageData);

                $taller = new Taller();
                $taller->name = $request->input('name');
                $taller->email = $request->input('email');
                $taller->password = bcrypt($password); 
                $taller->telefono=$request->input('telefono');
                $taller->location=$request->input('location');
                $taller->numEmpleados=$request->input('cantidad');
                $taller->logo = $base64Image;          
                $taller->save(); 

                $id = $taller->id; 
                $name= $taller->name;
                Session::put('id', $id); 
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
