<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TiqueteSeeder extends Seeder
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
