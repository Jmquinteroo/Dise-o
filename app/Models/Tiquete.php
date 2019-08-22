<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiquete extends Model
{
    protected $fillable = [
        'evento_id', 'fecha_limite','precio','estado','user_id'];
}
