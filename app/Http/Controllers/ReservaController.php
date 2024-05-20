<?php 
namespace App\Http\Controllers;

use App\Models\Reserva;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{


    public function index(){
        $id = session('Taller')->id;
        $reservas = Reserva::where('id_taller', $id)->get();
        
    $eventos = [];

    foreach ($reservas as $reserva){
        $eventos[] = [
            'title' => $reserva->descripcion,
            'start' => $reserva->start_date,
            'end' => $reserva->end_date,
            'id'=> $reserva->id,
        ];
    }

    return view('Taller', compact('eventos'));

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
            return redirect()->route('reserva.index')->with('success', "Reserva Creada exitosamente"); // Aquí modificamos para acceder al mensaje de éxito
        } else {
            return redirect()->route('reserva.index')->with('error', "Error al crear la Reserva fijate bien en los campos"); // Aquí modificamos para acceder al mensaje de error
        }

    }


    public function destroy(Request $request)
{
    try {
        $id = $request->input('delete_id');
        $reserva = Reserva::find($id);

        if (is_null($reserva)) {
            return redirect()->route('reserva.index')->with('error', 'La reserva no fue encontrada');
        }

        $reserva->delete();

        // Actualizar los IDs si es necesario
        Reserva::where('id', '>', $id)->update(['id' => DB::raw('id - 1')]);

        return redirect()->route('reserva.index')->with('success', 'La reserva fue eliminada correctamente');
    } catch (\Exception $e) {
        return redirect()->route('reserva.index')->with('error', 'Error al eliminar la reserva');
    }
}







}
