<?php

use Illuminate\Database\Seeder;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \App\Models\Lugar::create(['nombre'=>'Atanacio','tipo_lugar'=>'Estadio', 'capacidad'=>1400,'direccion'=>'Cra. 74 #48010,','barrio'=>'Estadio', 'sectores'=>4]);
        \App\Models\Lugar::create(['nombre'=>'PequeñoTeatro','tipo_lugar'=>'Teatro', 'capacidad'=>200,'direccion'=>'Carrera 42 No. 50 A 12','barrio'=>'Córdoba con La Playa', 'sectores'=>2]);
        //
    }
}
