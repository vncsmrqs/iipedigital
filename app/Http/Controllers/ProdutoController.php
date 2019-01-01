<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Requests\ProdutoValidation;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
 
        return response()->json([
            'success' => true,
            'data' => $produtos
        ]);
    }
 
    public function show($id)
    {
        $produto = Produto::find($id);
 
        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto com o id ' . $id . ' nao encontrado'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $produto->toArray()
        ], 400);
    }
 
    public function store(ProdutoValidation $request)
    {
        $dadosDaValidacao = $request->validated();

        $produto = new Produto();
        
        $produto->referencia = $request->referencia;
        $produto->descricao = $request->descricao;
        $produto->marca = $request->marca;
        $produto->preco_unitario = $request->preco_unitario;
        $produto->estoque = $request->estoque;
        $produto->unidade_venda = $request->unidade_venda;
 
        if ($produto->save())
            return response()->json([
                'success' => true,
                'data' => $produto->toArray()
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Produto nao pode ser adicionado'
            ], 500);
    }
 
    public function update(ProdutoValidation $request, $id)
    {
        $produto = Produto::find($id);
 
        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto com o id ' . $id . ' nao encontrado'
            ], 400);
        }
 
        $atualizado = $produto->fill($request->all())->save();
 
        if ($atualizado)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Produto nao pode ser atualizado'
            ], 500);
    }
 
    public function destroy($id)
    {
        $produto = Produto::find($id);
 
        if (!$produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto com o id ' . $id . ' nao encontrado'
            ], 400);
        }
 
        if ($produto->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produto nao pode ser deletado'
            ], 500);
        }
    }
}
