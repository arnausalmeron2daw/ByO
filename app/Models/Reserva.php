<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{

    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_taller',
        'day',
        'start_date' ,
        'end_date',
        'descripcion',
        'cita',
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'id_taller');
    }
}
