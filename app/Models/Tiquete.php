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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function Evento()
    {
        return $this->belongsTo('App\Models\Evento');
    }
}
