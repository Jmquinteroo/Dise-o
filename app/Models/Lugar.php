<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    //
    protected $table = 'lugares';
    protected $fillable = [
        'nombre',
        'tipo_lugar',
       // 'capacidad',
        'direccion',
        //'barrio',
        'sectores'
    ];


}
