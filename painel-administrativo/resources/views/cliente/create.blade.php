@extends('layout', ['title' => 'Criar Cliente'])
@section('content')
<form method="post" action="{{ route('cliente.store') }}">
    @csrf
    @include('cliente._form')
</form>
@endsection
