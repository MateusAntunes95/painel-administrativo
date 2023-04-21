@extends('layout', ['title' => 'Editando tipo acesso'])
@section('content')
<form method="POST" action="{{ route('tipo_acesso.update', $tipoAcesso->id) }}">
    @csrf
    @method('PATCH')
    @include('tipo_acesso._form')
</form>
@endsection
