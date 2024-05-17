<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;

class ShowTallerController extends Controller
{
    public function show($id)
    {
        $taller = Taller::findOrFail($id); // Obtén los detalles del taller usando su ID
        return view('showTaller', compact('taller'));
    }
}
