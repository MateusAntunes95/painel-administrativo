<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Cliente;
use App\Models\Perfil;
use App\Repositories\Album\ListarRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function index(Request $request, ListarRepository $listarRepository)
    {
        $dados = $listarRepository->listar($request->all())->paginate(10);

        return view('album.index', compact('dados', 'request'));
    }

    public function create()
    {
        $clientes = Cliente::pluck('nome_usuario', 'id');

        return view('album.create')
            ->with(compact('clientes'));
    }

    public function store(Request $request)
    {
        $album = new Album();
        $album->fill($request->all());

        if ($request->hasFile('album_image')) {
            $regex = '/\.[^\/.]+$/';
            $anexo = $request->album_image;
            $fileName = preg_replace($regex, '', $anexo->getClientOriginalName());
            $extension = $anexo->extension();
            $nomeAnexo = $fileName . "." . strtotime("now") . "." . $extension;
            $request->album_image->move(public_path('images/album'), $nomeAnexo);
            $album->caminho_imagem_principal = $nomeAnexo;
        }

        if ($request->hasFile('album_video')) {
            $regex = '/\.[^\/.]+$/';
            $anexo = $request->album_video;
            $fileName = preg_replace($regex, '', $anexo->getClientOriginalName());
            $extension = $anexo->extension();
            $nomeAnexo = $fileName . "." . strtotime("now") . "." . $extension;
            $request->album_video->move(public_path('images/album'), $nomeAnexo);
            $album->caminho_video = $nomeAnexo;
        }

        $album->saveOrFail();

        return redirect()->route('album.index')->with('success', 'Album Criado com sucesso!');
    }

    public function edit(Album $album)
    {
        $clientes = Cliente::query()->select('id', 'nome_usuario')
            ->with('perfis:cliente_id,tipo,nome_usuario')
            ->get();

        $perfis = Perfil::query()->select([
            'id',
            DB::raw("CONCAT(tipo,  ' - ' , nome_usuario) AS nome")
        ])->get();

        return view('album.edit')
            ->with(compact('album'))
            ->with(compact('perfis'))
            ->with(compact('clientes'));
    }

    public function update(Request $request, Album $album)
    {
        $album = Album::find($album->id);
        $album->fill($request->all());

        if ($request->hasFile('album_image')) {
            $regex = '/\.[^\/.]+$/';
            $anexo = $request->album_image;
            $fileName = preg_replace($regex, '', $anexo->getClientOriginalName());
            $extension = $anexo->extension();
            $nomeAnexo = $fileName . "." . strtotime("now") . "." . $extension;
            $request->album_image->move(public_path('images/album'), $nomeAnexo);
            $album->caminho_imagem_principal = $nomeAnexo;
        }

        if ($request->hasFile('album_video')) {
            $regex = '/\.[^\/.]+$/';
            $anexo = $request->album_video;
            $fileName = preg_replace($regex, '', $anexo->getClientOriginalName());
            $extension = $anexo->extension();
            $nomeAnexo = $fileName . "." . strtotime("now") . "." . $extension;
            $request->album_video->move(public_path('images/album'), $nomeAnexo);
            $album->caminho_video = $nomeAnexo;
        }

        $album->saveOrFail();

        return redirect()->route('album.index')->with('success', 'Album editado com sucesso!');
    }

    public function preenchePerfil($id)
    {
        $query = Perfil::select([
            'id',
            DB::raw("CONCAT(tipo,  ' - ' , nome_usuario) AS nome")
        ])->where('cliente_id', $id)->get();
        $perfil = $query;

        return response()->json($perfil, 200);
    }
}
