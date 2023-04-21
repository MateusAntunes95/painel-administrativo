@extends('layout', ['title' => 'Relatório'])
@section('content')
<form method="get" action="{{ url('albuns_versos_clientes') }}">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4">
                    <label> Nome </label>
                    <input name="nome_usuario" type="text" class="form-control" placeholder="Procure por nome"
                        value="{{$request->nome}}">
                </div>
                <div class="col-sm-4">
                    <label> titulo </label>
                    <input name="titulo" type="text" class="form-control" placeholder="Procure por nome"
                        value="{{$request->titulo}}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Pesquisar
            </button>
        </div>
    </div>
</form>
<div class="card-body">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome úsuario</th>
                <th>Titulo</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $dado )
            <tr>
                <td>{{ $dado->nome_usuario }}</td>
                <td>{{ $dado->titulo }}</td>
                <td>{{ $dado->total_linha }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($dados instanceof Illuminate\Pagination\LengthAwarePaginator)
    @include('pagination', ['dados' => $dados])
    @endif
</div>
@endsection