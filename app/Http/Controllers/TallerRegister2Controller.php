<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taller; // Asegúrate de importar el modelo Taller
use Illuminate\Support\Facades\Session;

class TallerRegister2Controller extends Controller
{
    public function index()
    {
        return view('tallerRegister2');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'location' => 'required|string',
            'cantidad' => 'required|string',
        ]);

        // Obtener el ID del taller desde la sesión
        $tallerId = Session::get('id');

        $taller = Taller::find($tallerId);

        // Actualizar los datos del taller con los valores del formulario
        $taller->location = $validatedData['location'];
        $taller->numEmpleados = $validatedData['cantidad'];
        // Asigna los valores para otros campos si los tienes

        // Guardar los cambios en la base de datos
        $taller->save();

        // Redireccionar a una página de éxito u otra página según sea necesario
        return redirect()->route('tallerRegister3.index');
    }
}
