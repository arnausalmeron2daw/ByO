<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ShowTallerController extends Controller
{
    public function show($id)
{
    $taller = Taller::findOrFail($id); // Obtén los detalles del taller usando su ID
    
    $reservas = Reserva::where('id_taller', $taller->id)->get(); // Busca las reservas del taller específico
    $citasNoDisponibles  = [];

    foreach ($reservas as $reserva){
        $citasNoDisponibles [] = [
            'title' => $reserva->descripcion,
            'start' => $reserva->start_date,
            'end' => $reserva->end_date,
            'id'=> $reserva->id,
        ];
    }

    
    return view('showTaller', compact('taller','citasNoDisponibles'));

}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_taller' => 'required|exists:talleres,id',
            'day' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'descripcion' => 'required|string|max:255',
            'cita' => 'required|string|max:255',
        ]);
        
        $reserva = Reserva::create($validatedData);

        $response = response()->json($reserva, 201);
     
        if ($response) {
            return redirect()->route('showTaller.show')->with('success', "Reserva Creada exitosamente"); // Aquí modificamos para acceder al mensaje de éxito
        } else {
            return redirect()->route('showTaller.show')->with('error', "Error al crear la Reserva fijate bien en los campos"); // Aquí modificamos para acceder al mensaje de error
        }

    }






    
}
