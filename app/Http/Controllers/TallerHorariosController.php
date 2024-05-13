<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorarioTaller;
use Illuminate\Support\Facades\Session;

class TallerHorariosController extends Controller
{
    public function index(){
        return view('tallerHorarios');
    }

    public function store(Request $request){
        $tallerId = Session::get('id');

        // Crear una nueva instancia de HorarioTaller
        $horarioTaller = new HorarioTaller();

        // Asignar el ID del taller al campo id_taller
        $horarioTaller->id_taller = $tallerId;
        
        // Asignar los valores de la solicitud a los campos correspondientes del modelo HorarioTaller
        $horarioTaller->lunes_cerrado = $request->has('lunes_cerrado');
        $horarioTaller->lunes_apertura = $request->input('lunes_apertura');
        $horarioTaller->lunes_cierre = $request->input('lunes_cierre');
        $horarioTaller->martes_cerrado = $request->has('martes_cerrado');
        $horarioTaller->martes_apertura = $request->input('martes_apertura');
        $horarioTaller->martes_cierre = $request->input('martes_cierre');
        $horarioTaller->miercoles_cerrado = $request->has('miercoles_cerrado');
        $horarioTaller->miercoles_apertura = $request->input('miercoles_apertura');
        $horarioTaller->miercoles_cierre = $request->input('miercoles_cierre');
        $horarioTaller->jueves_cerrado = $request->has('jueves_cerrado');
        $horarioTaller->jueves_apertura = $request->input('jueves_apertura');
        $horarioTaller->jueves_cierre = $request->input('jueves_cierre');
        $horarioTaller->viernes_cerrado = $request->has('viernes_cerrado');
        $horarioTaller->viernes_apertura = $request->input('viernes_apertura');
        $horarioTaller->viernes_cierre = $request->input('viernes_cierre');
        $horarioTaller->sabado_cerrado = $request->has('sabado_cerrado');
        $horarioTaller->sabado_apertura = $request->input('sabado_apertura');
        $horarioTaller->sabado_cierre = $request->input('sabado_cierre');
        $horarioTaller->domingo_cerrado = $request->has('domingo_cerrado');
        $horarioTaller->domingo_apertura = $request->input('domingo_apertura');
        $horarioTaller->domingo_cierre = $request->input('domingo_cierre');

        // Guardar el modelo en la base de datos
        $horarioTaller->save();

        // Redireccionar o realizar alguna acción después de guardar los datos
        return redirect()->route('tallerSuscription.index');
    }
}
