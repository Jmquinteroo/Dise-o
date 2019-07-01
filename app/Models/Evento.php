<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
        'name',
        'lugar',
        'direccion',
        'fechainicio',
        'fechafin',
        'hora',
        'precio'
    ];

}
