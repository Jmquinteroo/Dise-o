<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Evento::create(['nombre'=>'Crash Nebula sobre Hielo','lugar_id'=>1,'fecha_inicio'=>Carbon::parse('12-08-2019'),
            'fecha_fin'=>Carbon::parse('13-08-2019'),'hora'=>Carbon::parse('12:00'),'precios'=>20000]);
    }
}
