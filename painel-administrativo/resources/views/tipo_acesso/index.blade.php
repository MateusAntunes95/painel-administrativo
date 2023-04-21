@extends('layout', ['title' => 'Tipo de acesso'])
@section('content')
<form method="get" action="{{ route('tipo_acesso.index') }}">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-1">
                    <label> Código </label>
                    <input name="id" type="text" class="form-control" value="{{ $request->id }}">
                </div>
                <div class="col-sm-4">
                    <label> Titulo </label>
                    <input name="titulo" type="text" class="form-control" placeholder="Procure por nome"
                        value="{{$request->titulo}}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Pesquisar
            </button>
            <a href="{{ route('tipo_acesso.create') }}"> <button type="button" class="btn btn-success">
                    Criar tipo de acesso
                </button> </a>
        </div>
    </div>
</form>
<div class="card-body">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Titulo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $dado )
            <tr>
                <td>{{ $dado->id }}</td>
                <td>{{ $dado->titulo }}</td>
                <td class="d-flex align-items-center">
                    <a href='{{ route('tipo_acesso.edit', $dado->id) }}'>
                        <button class="btn btn-success"><i class="bi bi-pencil"></i></button>
                    </a>
                    <form method="post" action="{{ route('tipo_acesso.destroy', $dado->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-2"><i class="bi bi-trash"></i></button>
                    </form>
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