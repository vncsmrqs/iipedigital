<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        $faker = \Faker\Factory::create('pt_BR');

        $password = Hash::make('123456');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@ipedigital.com.br',
            'password' => $password,
            'admin' => true
        ]);
    
        $nome = $faker->firstName;

        User::create([
            'name' => 'Vinicius Marques da Silva',
            'email' => 'vinicius@ipedigital.com.br',
            'password' => $password,
            'admin' => false
        ]);
    }
}
