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
        $usr->phone         = 3216549898;
        $usr->birthdate     = '1968-03-01';
        $usr->gender        = 'Male';
        $usr->address       = 'Avd Siempre viva';
        $usr->password      = bcrypt('customer');
        $usr->created_at    = now();
        $usr->save();

        //Para correr la migracion debemos hacer el comando
        // php artisan db:seed
    }
}
