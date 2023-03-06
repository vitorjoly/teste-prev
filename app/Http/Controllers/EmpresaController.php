<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Traz todas empresas que estao no banco
        return Empresa::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Cria a empresa no banco de acordo com a requisicao
        if (Empresa::create($request->all())) {
            return response()->json([
                'message' => 'Empresa cadastrada com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar empresa.'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Retorna a empresa de acordo com o que sera passado
        $empresa = Empresa::find($id);
        if ($empresa) {
            $response = [
                'empresa' => $empresa,
                'usuarios' => $empresa->usuarios
            ];
            
            return $response;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar empresa.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empresa = Empresa::findOrFail($id);

        if ($empresa) {
            $empresa->update($request->all());
            return response()->json([
                'message' => 'Empresa atualizada com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao atualizar empresa.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Empresa::destroy($id)) {
            return response()->json([
                'message' => 'Empresa excluida com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao excuir empresa.'
        ], 404);
    }
}
