<?php

namespace App\Http\Controllers;

use App\Repositories\Relatorio\ListarRepository;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{
    public function index(Request $request, ListarRepository $listarRepository)
    {
        $dados = $listarRepository->listar($request->all())->paginate(10);

        return view('relatorio.index', compact('dados', 'request'));
    }
}
