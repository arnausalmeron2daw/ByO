<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MisReservasController extends Controller
{
    public function index()
    {
        $reservas = Reserva::where('id_user', session('id_user'))->with('taller')->get();
        return view('misReservas', compact('reservas'));
    }

    public function destroy($id)
    {
        try {
            $reserva = Reserva::find($id);

            if (is_null($reserva)) {
                return redirect()->route('misReservas.index')->with('error', 'La reserva no fue encontrada');
            }

            $reserva->delete();

            // Actualizar los IDs si es necesario
            Reserva::where('id', '>', $id)->update(['id' => DB::raw('id - 1')]);

            return redirect()->route('misReservas.index')->with('success', 'La reserva fue eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('misReservas.index')->with('error', 'Error al eliminar la reserva');
        }
    }
}
