<?php

namespace App\Http\Controllers;

use App\Models\ModuloAcesso;
use App\Models\TipoAcesso;
use App\Repositories\TipoAcesso\ListarRepository;
use Illuminate\Http\Request;

class TipoAcessoController extends Controller
{
    public function index(Request $request, ListarRepository $listarRepository)
    {
        $dados = $listarRepository->listar($request->all())->paginate(10);

        return view('tipo_acesso.index', compact('dados', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoAcesso = new TipoAcesso();

        return view('tipo_acesso.create')
            ->with(compact('tipoAcesso'));
    }

    public function store(Request $request)
    {
        $tipoAcesso = new TipoAcesso();
        $tipoAcesso->fill($request->all());
        $tipoAcesso->saveOrFail();
        foreach ($request->moduloAcesso ?? [] as $value) {
            $moduloAcesso = new ModuloAcesso();
            $moduloAcesso->tipo_acesso_id = $tipoAcesso->id;
            $moduloAcesso->modulo_acesso = $value['modolu'];
            $moduloAcesso->adicionar = isset($value['adicionar']);
            $moduloAcesso->editar = isset($value['editar']);
            $moduloAcesso->excluir = isset($value['excluir']);
            $moduloAcesso->visualizar = isset($value['visualizar']);
            $moduloAcesso->saveOrFail();
        }

        return redirect()->route('tipo_acesso.index')->with('success', 'tipo acesso criado com sucesso!');
    }

    public function edit(TipoAcesso $tipoAcesso)
    {
        $tipoAcesso = $tipoAcesso->load('modulos');

        return view('tipo_acesso.edit')
            ->with(compact('tipoAcesso'));
    }

    public function update(Request $request, TipoAcesso $tipoAcesso)
    {
        $tipoAcesso = TipoAcesso::find($request->id);
        $tipoAcesso->fill($request->all());
        $tipoAcesso->saveOrFail();
        $arrayIdsManter = [];
        foreach ($request->moduloAcesso ?? [] as $value) {
            $moduloAcesso = new ModuloAcesso();
            $moduloAcesso->tipo_acesso_id = $tipoAcesso->id;
            $moduloAcesso->modulo_acesso = $value['modolu'];
            $moduloAcesso->adicionar = isset($value['adicionar']);
            $moduloAcesso->editar = isset($value['editar']);
            $moduloAcesso->excluir = isset($value['excluir']);
            $moduloAcesso->visualizar = isset($value['visualizar']);
            $moduloAcesso->saveOrFail();
            $arrayIdsManter[] = $moduloAcesso->id;
        }
        ModuloAcesso::where('tipo_acesso_id', $tipoAcesso->id)->whereNotIn('id', $arrayIdsManter)->delete();

        return redirect()->route('tipo_acesso.index')->with('success', 'tipo acesso editado com sucesso!');
    }

    public function destroy(TipoAcesso $tipoAcesso)
    {
        ModuloAcesso::where('tipo_acesso_id', $tipoAcesso->id)->delete();
        $tipoAcesso->delete();

        return redirect()->route('tipo_acesso.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
