<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorarioTaller;
use Illuminate\Support\Facades\Session;

class TallerConfigController extends Controller
{
    public function index(){
        $tallerId = Session::get('id');
        $horarioTaller = HorarioTaller::where('id_taller', $tallerId)->first();
        return view('tallerConfig',compact('horarioTaller'));
    }
}
