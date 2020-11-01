<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
    protected $fillable = [
        'Nombre_sucursal', 'Direccion','Telefono','Horario_atencion'
    ];
}
