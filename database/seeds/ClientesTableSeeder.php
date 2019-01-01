<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $faker->addProvider(new JansenFelipe\FakerBR\FakerBR($faker));

        foreach(range(1,10) as $i){
            $tipo = $faker->randomElement(['fisico', 'juridico']);
            $cpf_cnpj =  $tipo == 'fisico' ? $faker->cpf : $faker->cnpj; 
            $cliente = Cliente::create([  
                'nome' => $faker->name, 
                'tipo' => $tipo, 
                'cpf_cnpj' => $cpf_cnpj, 
                'logradouro' => $faker->streetName, 
                'numero' => $faker->randomNumber($nbDigits = 3, $strict = false) ,
                'cidade' => $faker->city,
                'bairro' => 'centro', 
                'estado' => $faker->state, 
                'cep' =>$faker->postcode
            ]);

            $cliente->telefones()->createMany([['numero' => $faker->phoneNumber],['numero' => $faker->phoneNumber]]);
        }
    }
}
