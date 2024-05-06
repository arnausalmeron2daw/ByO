<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Taller extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'talleres';

    protected $fillable = ['name', 'email', 'password', 'location', 'suscription', 'partner', 'telefono', 'numEmpleados','logo'];

    // Métodos requeridos por la interfaz Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // No se utiliza
    }

    public function getRememberTokenName()
    {
        return null;
    }
}
