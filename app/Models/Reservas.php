<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

   protected $fillable = [
        'lunes_cerrado',
        'lunes_apertura',
        'lunes_cierre',
        'martes_cerrado',
        'martes_apertura',
        'martes_cierre',
        'miercoles_cerrado',
        'miercoles_apertura',
        'miercoles_cierre',
        'jueves_cerrado',
        'jueves_apertura',
        'jueves_cierre',
        'viernes_cerrado',
        'viernes_apertura',
        'viernes_cierre',
        'sabado_cerrado',
        'sabado_apertura',
        'sabado_cierre',
        'domingo_cerrado',
        'domingo_apertura',
        'domingo_cierre',
    ];
}
