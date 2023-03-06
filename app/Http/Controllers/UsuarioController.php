<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Usuario::create($request->all())) {
            return response()->json([
                'message' => 'Usuario criado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao criar usuario.'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        if($usuario) {
            $response = [
                'usuario' => $usuario,
                'empresa' => $usuario->empresa,
            ];
            return $usuario;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar usuario.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            $usuario->update($request->all());
            return response()->json([
                'message' => 'Usuario alterado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao alterar usuario.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Usuario::destroy($id)) {
            return response()->json([
                'message' => 'Usuario deletado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao remover usuario.'
        ], 404);
    }
}
