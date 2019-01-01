<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Venda;
use App\Cliente;

use App\Http\Requests\VendaValidation;


class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::all();

        return response()->json([
            'success' => true,
            'data' => $vendas
        ]);
    }
 
    public function show($id)
    {
        $venda = Venda::find($id);
 
        if (!$venda) {
            return response()->json([
                'success' => false,
                'message' => 'Venda com o id ' . $id . ' nao encontrado'
            ], 400);
        }

        $venda->produtos = $venda->produtos;

        return response()->json([
            'success' => true,
            'data' => $venda->toArray()
        ], 400);
    }
 
    public function store(VendaValidation $request)
    {
        $dadosDaValidacao = $request->validated();
    
        $cliente = Cliente::find($request->cliente_id);

        $venda = new Venda();

        $venda->data_venda = $request->data_venda;
        $venda->total_vendido = $request->total_vendido;

        $produtos = $request->produtos;

        //$produtos = [id_produto => ['quantidade' => quantidade , 'preco_venda' => preco_venda]]

        if ($cliente->compras()->save($venda)->produtos()->sync($produtos))
            return response()->json([
                'success' => true,
                'data' => $venda->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Venda nao pode ser adicionado'
            ], 500);
    }
}
