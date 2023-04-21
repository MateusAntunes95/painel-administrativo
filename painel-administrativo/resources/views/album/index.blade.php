@extends('layout', ['title' => 'Cadastro de úsuario'])
@section('content')
<form method="get" action="{{ route('album.index') }}">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-1">
                    <label> Código </label>
                    <input name="id" type="text" class="form-control" value="{{ $request->id }}">
                </div>
                <div class="col-sm-4">
                    <label> Nome </label>
                    <input name="nome" type="text" class="form-control" placeholder="Procure por nome"
                        value="{{$request->nome}}">
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-5">
                        <label>Situação</label>
                        <select class="form-select" name="situacao">
                            <option value="" selected>Selecione uma situação</option>
                            <option value="disponivel_publico" {{ $request->situacao == 'ativo' ? 'selected' : '' }}>Disponível Público</option>
                            <option value="disponivel_restrito" {{ $request->situacao == 'inativo' ? 'selected' : '' }}>Disponível Restrito
                            </option>
                            <option value="bloqueado" {{ $request->situacao == 'bloqueado' ? 'selected' : ''
                                }}>Bloqueado</option>
                            <option value="excluido" {{ $request->situacao == 'bloqueado' ? 'selected' : ''
                                }}>Excluído</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Pesquisar
            </button>
            <a href="{{ route('album.create') }}"> <button type="button" class="btn btn-success">
                    Criar Album
                </button> </a>
        </div>
    </div>
</form>
<div class="card-body">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome úsuario</th>
                <th>Titulo</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $dado )
            <tr>
                <td>{{ $dado->id }}</td>
                <td>{{ $dado->nome_usuario }}</td>
                <td>{{ $dado->titulo }}</td>
                <td>{{ config('enums.album.situacao.'.$dado->situacao) }}</td>
                <td class="d-flex align-items-center">
                    <a href='{{ route('album.edit', $dado->id) }}'>
                        <button class="btn btn-success"><i class="bi bi-pencil"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($dados instanceof Illuminate\Pagination\LengthAwarePaginator)
    @include('pagination', ['dados' => $dados])
    @endif
</div>
@endsection