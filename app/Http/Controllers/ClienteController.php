<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Cliente::create($request->all())) {
            return response()->json([
                'message' => 'Cliente cadastrado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar cliente.'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) 
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $response = [
                'cliente' => $cliente,
                'usuarios' => $cliente->usuario
            ];
            
            return $response;

        }

        return response()->json([
            'message' => 'Erro ao pesquisar cliente.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->update($request->all());
            return response()->json([
                'message' => 'Cliente atualizado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao atualizar cliente.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Cliente::destroy($id);
    }
}
