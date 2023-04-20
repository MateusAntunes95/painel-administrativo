@extends('layout', ['title' => 'Editando Cliente'])
@section('content')
<form method="POST" action="{{ route('cliente.update', $cliente->id) }}">
    @csrf
    @method('PATCH')
    @include('cliente._form')
</form>
@endsection
