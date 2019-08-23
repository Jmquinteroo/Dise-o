<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
        'nombre',
        'lugar_id',
        'fecha_inicio',
        'fecha_fin',
        'hora',
        'precios',
    ];

    public function tiquetes()
    {
        return $this->hasMany('App\Model\Tiquete');
    }
}
