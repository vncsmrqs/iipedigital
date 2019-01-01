<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'referencia',
        'descricao',
        'marca',
        'preco_unitario',
        'estoque',
        'unidade_venda'
    ];

    public function vendas()
    {
        return $this->belongsToMany('App\Venda', 'itens_venda');
    }
}
