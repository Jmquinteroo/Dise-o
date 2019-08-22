<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TiquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tiquete::create(['evento_id'=>1,'precio'=>20000,'estado'=>'disponible']);

    }
}
