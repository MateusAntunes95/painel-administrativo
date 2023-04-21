@extends('layout', ['title' => 'Criar tipo de acesso'])
@section('content')
<form method="post" action="{{ route('tipo_acesso.store') }}">
    @csrf
    @include('tipo_acesso._form')
</form>
@endsection
