<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TallerConfigController extends Controller
{
    public function index()
    {
        $horarioTaller = Session::get('horarioTaller');
        
        if (!$horarioTaller) {
            return view('tallerConfig')->with('error', 'No se encontró el horario del taller.');
        }

        return view('tallerConfig', compact('horarioTaller'));
    }
}
