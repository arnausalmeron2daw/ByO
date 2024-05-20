<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TallerEditConfigController extends Controller
{
    public function edit($id)
    {
        $taller = Taller::findOrFail($id);
        return view('tallerEditConfig', compact('taller'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefono' => 'required|string|max:15',
            'numEmpleados' => 'required|integer',
            'location' => 'required|string|max:255',
            // Añade las validaciones para el horario
        ]);

        // Añade la actualización para el horario
        $taller = Taller::findOrFail($id);

        $taller->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'numEmpleados' => $request->numEmpleados,
            'location' => $request->location,
            // Añade la actualización para el horario
        ]);

        return redirect()->route('tallerEditConfig.edit', $taller->id)->with('success', 'Datos actualizados correctamente.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|confirmed',
        ]);

        $taller = Taller::findOrFail($id);

        $taller->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('tallerEditConfig.edit', $taller->id)->with('success', 'Contraseña actualizada correctamente.');
    }

    
}
