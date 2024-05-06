<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TallerConfigController extends Controller
{
    public function index(){
        return view('tallerConfig');
    }
}
