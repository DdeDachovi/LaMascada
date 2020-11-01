<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = [
        'Nombre_producto', 'Informacion', 'Precio', 'Visitas','tipo_id','imagen_id',
    ];
}
