<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $user= \App\User::create(['name'=>'jorge','apellido'=>'quintero', 'email'=>'jmqo25@gmail.com','fecha_nacimiento'=>Carbon::parse('12-08-1999'),'telefono'=>2589543, 'password'=>Hash::make('Jorge.123')]);
$user->assignRole('admin');

    }
}
