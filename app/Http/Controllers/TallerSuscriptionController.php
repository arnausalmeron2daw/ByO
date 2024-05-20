<?php

namespace App\Http\Controllers;
use App\Models\Taller; // Asegúrate de importar el modelo correcto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TallerSuscriptionController extends Controller
{
    function index()
    {
        return view('tallerSuscription');
    }

    function store(Request $request){
        if($request->has(['card_number','expiry_date','cvc'])){

            $id = Session::get('id'); // Obtener el ID del taller de la sesión
            $taller = Taller::findOrFail($id);

            // Actualizar la suscripción a true
            $taller->update(['suscription' => true]);

            // Redirigir o realizar otras acciones después de la actualización
            return redirect()->route('reserva.index')->with('success', 'Suscripción actualizada exitosamente.');
        }else{
            echo "Pago denegado";
        }
    }
}
