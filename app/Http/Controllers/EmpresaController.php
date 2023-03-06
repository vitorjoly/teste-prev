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
        return Empresa::create($request->all());
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

        $empresa->update($request->all());

        return $empresa;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Empresa::destroy($id);
    }
}
