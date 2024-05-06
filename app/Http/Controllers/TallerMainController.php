<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TallerMainController extends Controller
{
    public function index()
    {
        return view('tallerMain');
    }
}
