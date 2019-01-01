<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'cliente_id',
        'total_vendido',
        'data_venda'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'itens_venda')
            ->as('dados_venda')
            ->withPivot('quantidade', 'preco_venda');
    }
}
