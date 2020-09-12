<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usr = new User;
        $usr->fullname      = 'Homero Simpson';
        $usr->email         = 'Homero@gmail.com';
        $usr->phone         = '3216549898';
        $usr->birthdate     = '1968-03-01';
        $usr->gender        = 'Male';
        $usr->address       = 'Avd Siempre viva';
        $usr->password      = bcrypt('customer'); //Encriptar
        $usr->created_at    = now(); //Fecha
        $usr->save();

        //Para correr la migracion debemos hacer el comando
        // php artisan db:seed

        // php artisan migrate:fresh --seed;


        //Factory
        factory(User::class, 10)->create();
    }
}
