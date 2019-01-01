<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 
        'tipo', 
        'cpf_cnpj', 
        'logradouro', 
        'numero', 
        'bairro', 
        'cidade', 
        'estado', 
        'cep'
    ];
    
    
    public function telefones()
    {
        return $this->hasMany('App\Telefone');
    }

    public function compras()
    {
        return $this->hasMany('App\Venda');
    }
}
