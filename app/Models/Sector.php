<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{

    protected $table = 'sectores';
    protected $fillable = [
        'nombresector',
        'capacidad',
        'lugar_id'

    ];
    //
}
