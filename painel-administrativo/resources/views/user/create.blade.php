@extends('layout', ['title' => 'Criar úsuario'])
@section('content')
<form method="post" action="{{ route('user.store') }}">
    @csrf
    @include('user._form')
</form>
@endsection