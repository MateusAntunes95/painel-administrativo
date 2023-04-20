@extends('layout', ['title' => 'Cadastro de úsuario'])
@section('content')
<form method="get" action="{{ route('user.index') }}">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-1">
                    <legend> código </legend>
                    <input name="id" type="text" class="form-control">
                </div>
                <div class="col-sm-4">
                    <legend> Nome </legend>
                    <input name="nome" type="text" class="form-control" placeholder="Procure por nome">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Pesquisar
            </button>
            <a href="{{ route('user.create') }}"> <button type="button" class="btn btn-success">
                    Criar Usuário
                </button> </a>
        </div>
    </div>
</form>
<div class="card-body">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $dado )
            <tr>
                <td>{{ $dado->id }}</td>
                <td>{{ $dado->nome }}</td>
                <td>{{ $dado->email }}</td>
                <td>{{ $dado->celular }}</td>
                <td>{{ $dado->situacao }}</td>
                <td class="d-flex align-items-center">
                    <a href='{{ route('user.edit', $dado->id) }}'>
                        <button class="btn btn-success"><i class="bi bi-pencil"></i></button>
                    </a>
                    <form method="post" action="{{ route('user.destroy', $dado->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-2"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
