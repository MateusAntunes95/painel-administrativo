<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Perfil;
use App\Repositories\Cliente\GravarRepository;
use App\Repositories\Cliente\ListarRepository;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request, ListarRepository $listarRepository)
    {
        $dados = $listarRepository->listar($request->all())->paginate(10);
    
        return view('cliente.index', compact('dados', 'request'));
    }

    public function create()
    {
        $cliente = new Cliente();
        $endereco = new Endereco();

        return view('cliente.create')
            ->with(compact('cliente'))
            ->with(compact('endereco'));
    }

    public function store(ClienteFormRequest $request, GravarRepository $gravarRepository)
    {
        if (!$gravarRepository->criaOuAtualiza($request->all())) {
            return redirect()->back()->withErrors('Error ao salvar cliente.');
        }

        return redirect()->route('cliente.index')->with('success', 'Cliente Criado com sucesso!');
    }

    public function edit(Cliente $cliente)
    {

        $endereco = $cliente->endereco->first();

        return view('cliente.edit')
        ->with(compact('cliente'))
        ->with(compact('endereco'));
    }

    public function update(ClienteFormRequest $request, Cliente $cliente, GravarRepository $gravarRepository)
    {
        if (!$gravarRepository->criaOuAtualiza($request->all(), $cliente->id)) {
            return redirect()->back()->withErrors('Error ao salvar usuario.');
        }

        return redirect()->route('cliente.index')->with('success', 'Cliente editado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        Endereco::where('cliente_id', $cliente->id)->delete();
        Perfil::where('cliente_id', $cliente->id)->delete();
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente deletado com sucesso!');
    }
}
