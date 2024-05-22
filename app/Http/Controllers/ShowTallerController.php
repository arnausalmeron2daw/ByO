<?php
namespace App\Http\Controllers;

use App\Models\Taller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\HorarioTaller;
use Illuminate\Support\Facades\Session;

class ShowTallerController extends Controller
{
    public function show($id)
    {

        $taller = Taller::findOrFail($id);
        $reservas = Reserva::where('id_taller', $taller->id)->get();
        $citasNoDisponibles = [];

        foreach ($reservas as $reserva) {
            $citasNoDisponibles[] = [
                'title' => $reserva->descripcion,
                'start' => $reserva->start_date,
                'end' => $reserva->end_date,
                'id' => $reserva->id,
            ];
        }

        $horarioTaller = HorarioTaller::where('id_taller', $taller->id)->first();
        return view('showTaller', compact('taller', 'citasNoDisponibles', 'horarioTaller'));
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

        Session::put('id_reserva', $reserva->id_taller);

        if ($reserva) {
            return redirect()->route('dashboard')->with('success', "Reserva creada exitosamente");
        } else {
            return redirect()->back()->with('error', "Error al crear la reserva. Verifica los campos e intenta de nuevo.");
        }
    }
}
