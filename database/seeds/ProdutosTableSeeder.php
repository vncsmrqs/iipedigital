<?php

use Illuminate\Database\Seeder;
use App\Produto;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');

        foreach(range(1,20) as $i){
            Produto::create([
                'referencia' => "PRODUTO".$i,
                'descricao' => $i." Produto",
                'marca' => $faker->company,
                'preco_unitario' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 50),
                'estoque' => mt_rand(1,100),
                'unidade_venda' => $faker->randomElement(['CX', 'PCT', 'PC']),
            ]);
        }
    }
}
