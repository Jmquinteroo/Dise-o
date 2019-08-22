<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiquete extends Model
{
    protected $table = 'tiquetes';
    protected $fillable = [
        'evento_id',
        'fecha_limite',
        'precio',
        'estado',
        'user_id'
    ];
}
