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


        \App\Models\Lugar::create(['nombre'=>'Atanacio','tipo_lugar'=>'Estadio', 'direccion'=>'Cra. 74 #48010,','sectores'=>4]);
        \App\Models\Lugar::create(['nombre'=>'PequeñoTeatro','tipo_lugar'=>'Teatro','direccion'=>'Carrera 42 No. 50 A 12','sectores'=>2]);
        //
    }
}
