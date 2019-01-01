<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteValidation;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
 
        return response()->json([
            'success' => true,
            'data' => $clientes
        ], 200);
    }
 
    public function show($id)
    {
        $cliente = Cliente::find($id);
        
        if (!$cliente) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente com o id ' . $id . ' nao encontrado'
            ], 400);
        }

        $cliente->telefones = Cliente::find($id)->telefones;

        return response()->json([
            'success' => true,
            'data' => $cliente->toArray()
        ], 200);
    }
 
    public function store(ClienteValidation $request)
    {
        $dadosDaValidacao = $request->validated();

        $cliente = new Cliente();
        
        $cliente->nome = $request->nome;
        $cliente->tipo = $request->tipo;
        $cliente->cpf_cnpj = $request->cpf_cnpj;
        $cliente->logradouro = $request->logradouro;
        $cliente->numero = $request->numero;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;

        if (Cliente::create($request->all())->telefones()->createMany($request->telefones))
            return response()->json([
                'success' => true,
                'data' => $cliente->toArray()
            ], 201);
        else
            return response()->json([
                'success' => false,
                'message' => 'Cliente nao pode ser adicionado'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
 
        if (!$cliente) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente com o id ' . $id . ' nao encontrado'
            ], 400);
        }

        $atualizado = $cliente->fill($request->all())->save();
        
        $cliente->telefones()->delete();
        
        $cliente->telefones()->createMany($request->telefones);

        if ($atualizado)
            return response()->json([
                'success' => true
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Cliente nao pode ser atualizado'
            ], 500);
    }
 
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
 
        if (!$cliente) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente com o id ' . $id . ' nao encontrado'
            ], 400);
        }
 
        if ($cliente->delete()) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cliente nao pode ser deletado'
            ], 500);
        }
    }
}
